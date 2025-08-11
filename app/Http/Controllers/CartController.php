<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Medications;
use App\Models\CartItems;
use App\Models\Orders;
use App\Models\OrderItems;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItems::with('medication')
            ->where('user_id', Auth::id())
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->Price * $item->Quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'medication_id' => 'required|exists:medications,MedicationID',
            'quantity' => 'required|integer|min:1',
        ]);

        $medication = Medications::findOrFail($request->medication_id);

        if ($medication->Stock < $request->quantity) {
            return redirect()->back()->with('error', 'Not enough stock available. Only ' . $medication->Stock . ' items left.');
        }

        $userId = Auth::id();

        $cartItem = CartItems::where('user_id', $userId)
            ->where('MedicationID', $medication->MedicationID)
            ->first();

        if ($cartItem) {
            $newQuantity = $cartItem->Quantity + $request->quantity;
            if ($newQuantity > $medication->Stock) {
                return redirect()->back()->with('error', 'Cannot add more items. Total would exceed available stock.');
            }

            $cartItem->Quantity = $newQuantity;
            $cartItem->save();
        } else {
            CartItems::create([
                'user_id' => $userId,
                'MedicationID' => $medication->MedicationID,
                'Quantity' => $request->quantity,
                'Price' => $medication->DefaultUnitPrice,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Item added to cart!');
    }

    public function update(Request $request, $cartItemId)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $cartItem = CartItems::where('CartItemID', $cartItemId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($cartItem->medication->Stock < $request->quantity) {
            return redirect()->back()->with('error', 'Cannot update quantity. Only ' . $cartItem->medication->Stock . ' items available in stock.');
        }

        $cartItem->update(['Quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    public function remove($cartItemId)
    {
        $cartItem = CartItems::where('CartItemID', $cartItemId)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    public function clear()
    {
        $deletedCount = CartItems::where('user_id', Auth::id())->delete();

        if ($deletedCount > 0) {
            return redirect()->route('cart.index')->with('success', 'Cart cleared successfully.');
        }

        return redirect()->route('cart.index')->with('info', 'Cart is already empty.');
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cartItems = CartItems::with('medication')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $request->validate([
            'shipping_address' => 'sometimes|string|max:500',
            'payment_method' => 'sometimes|in:cash_on_delivery,credit_card,debit_card,online_banking',
            'special_instructions' => 'sometimes|string|max:1000',
        ]);

        DB::beginTransaction();

        try {
            $totalAmount = 0;
            $outOfStockItems = [];

            foreach ($cartItems as $item) {
                if ($item->medication->Stock < $item->Quantity) {
                    $outOfStockItems[] = $item->medication->Name . ' (Available: ' . $item->medication->Stock . ', Requested: ' . $item->Quantity . ')';
                }
                $totalAmount += $item->Price * $item->Quantity;
            }

            if (!empty($outOfStockItems)) {
                DB::rollBack();
                return redirect()->route('cart.index')->with('error', 'Some items are out of stock: ' . implode(', ', $outOfStockItems));
            }

            $order = Orders::create([
                'user_id' => $user->id,
                'order_number' => 'ORDER-' . strtoupper(Str::random(10)),
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'shipping_address' => $request->input('shipping_address', 'Default Address'),
                'payment_method' => $request->input('payment_method', 'cash_on_delivery'),
                'payment_status' => 'unpaid',
                'special_instructions' => $request->input('special_instructions'),
                'order_date' => now(),
            ]);

            foreach ($cartItems as $item) {
                OrderItems::create([
                    'OrderID' => $order->id,
                    'MedicationID' => $item->MedicationID,
                    'Quantity' => $item->Quantity,
                    'Price' => $item->Price
                ]);

                $item->medication->decrement('Stock', $item->Quantity);
            }

            CartItems::where('user_id', $user->id)->delete();

            DB::commit();

            return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }

    public function showCheckout()
    {
        $cartItems = CartItems::with('medication')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->Price * $item->Quantity;
        });

        //TODO: Check if this is working later
        return view('cart.index', compact('cartItems', 'total'));
    }

    public function applyDiscount(Request $request)
    {
        $request->validate([
            'discount_code' => 'required|string|max:50'
        ]);

        return redirect()->route('cart.index')->with('info', 'Discount feature coming soon.');
    }
}
