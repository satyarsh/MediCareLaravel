<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare - My Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .fade-in { animation: fadeIn 0.8s ease-in-out; }
        .slide-up { animation: slideUp 0.5s ease-out; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    </style>
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-indigo-900 shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                    <a href="{{ url('/') }}" class="text-xl font-bold text-white">MediCare</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/notifications') }}" class="text-white hover:text-green-400">
                        <i class="fas fa-bell"></i>
                    </a>
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white hover:text-green-400 flex items-center">
                            <i class="fas fa-sign-out-alt mr-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6 fade-in">
            <h1 class="text-2xl font-bold text-green-400">
                <i class="fas fa-shopping-cart mr-2"></i> My Cart
            </h1>

            <a href="{{ route('medication.index') }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg transition flex items-center">
                <i class="fas fa-pills mr-2"></i> Continue Shopping
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-900/50 border border-green-500 text-green-300 px-4 py-3 rounded-lg mb-6 fade-in">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-900/50 border border-red-500 text-red-300 px-4 py-3 rounded-lg mb-6 fade-in">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
            </div>
        @endif

        @if($cartItems->isEmpty())
            <div class="bg-gray-800 rounded-xl shadow-lg p-8 text-center border border-gray-700 fade-in">
                <div class="w-20 h-20 mx-auto bg-gray-700 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-shopping-cart text-3xl text-gray-500"></i>
                </div>
                <p class="text-xl mb-4">Your cart is empty</p>
                <p class="text-gray-400 mb-6">Add medicines to your cart and they will appear here</p>

                <a href="{{ route('medication.index') }}" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg transition inline-flex items-center">
                    <i class="fas fa-pills mr-2"></i> Browse Medicines
                </a>
            </div>
        @else
            <!-- Cart Items -->
            <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-700 mb-6 slide-up">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Subtotal
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach($cartItems as $item)
                            <tr class="hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-12 w-12 flex-shrink-0 rounded-lg bg-indigo-900/30 flex items-center justify-center mr-4">
                                            @if($item->medication->image ?? false)
                                                <img src="{{ asset('storage/'.$item->medication->image) }}" alt="{{ $item->medication->Name }}" class="h-12 w-12 rounded-lg object-cover">
                                            @else
                                                <i class="fas fa-capsules text-green-400 text-xl"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="text-base font-medium">{{ $item->medication->Name }}</div>
                                            {{-- <div class="text-sm text-gray-400">{{ Str::limit($item->medication->description, 40) }}</div> --}}
                                            <div class="text-sm text-gray-400">
                                                @if($item->medication->GenericName && $item->medication->GenericName !== $item->medication->Name)
                                                    Generic: {{ $item->medication->GenericName }}
                                                @else
                                                    Quality medication
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-base text-green-400 font-medium">
                                    ${{ number_format($item->Price, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('cart.update', $item->CartItemID) }}" method="POST" class="flex items-center">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="decrementQuantity(this)" class="bg-gray-700 text-gray-300 hover:bg-gray-600 h-8 w-8 rounded-l-lg flex items-center justify-center border border-gray-600">
                                            <i class="fas fa-minus text-xs"></i>
                                        </button>
                                        <input type="number" name="quantity" id="quantity-{{ $item->CartItemID }}" min="1" max="{{ $item->medication->Stock }}" value="{{ $item->Quantity }}"
                                               class="h-8 w-12 border-y border-gray-600 text-center bg-gray-700 text-white"
                                               onchange="this.form.submit()">
                                        <button type="button" onclick="incrementQuantity(this)" class="bg-gray-700 text-gray-300 hover:bg-gray-600 h-8 w-8 rounded-r-lg flex items-center justify-center border border-gray-600">
                                            <i class="fas fa-plus text-xs"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-base text-gray-300">
                                    ${{ number_format($item->Price * $item->Quantity, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <form action="{{ route('cart.remove', $item->CartItemID) }}" method="POST" class="inline" onsubmit="return confirm('Remove this item from cart?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-900/50 hover:bg-red-900 text-red-400 p-2 rounded-lg transition">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Order Summary -->
                <div class="lg:col-span-1 bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700 fade-in">
                    <h2 class="text-xl font-bold mb-4 text-green-400">
                        <i class="fas fa-receipt mr-2"></i> Order Summary
                    </h2>
                    <div class="space-y-3">
                        <div class="flex justify-between py-2 border-b border-gray-700">
                            <span class="text-gray-400">Subtotal</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-700">
                            <span class="text-gray-400">Shipping</span>
                            <span class="text-green-400">Free</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-700">
                            <span class="text-gray-400">Tax</span>
                            <span>${{ number_format($total * 0.1, 2) }}</span>
                        </div>
                        <div class="flex justify-between py-3 text-lg font-bold">
                            <span>Total</span>
                            <span class="text-green-400">${{ number_format($total * 1.1, 2) }}</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="bg-indigo-900/30 rounded-lg p-4 border border-indigo-800/50 mb-4">
                            <div class="flex items-start">
                                <i class="fas fa-tag text-indigo-400 mt-1 mr-3"></i>
                                <div>
                                    <h3 class="font-medium text-indigo-400">Have a promo code?</h3>
                                    <div class="mt-2 flex">
                                        <input type="text" placeholder="Enter code" class="rounded-l-lg bg-gray-700 border-gray-600 text-white px-3 py-2 w-full focus:ring-indigo-500 focus:border-indigo-500">
                                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 rounded-r-lg transition">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Clear Cart Button -->
                    <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Clear entire cart?')" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition">
                            <i class="fas fa-trash mr-2"></i> Clear Cart
                        </button>
                    </form>
                </div>

                <!-- Checkout Form -->
                <div class="lg:col-span-2 bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700 slide-up">
                    <h2 class="text-xl font-bold mb-4 text-green-400">
                        <i class="fas fa-credit-card mr-2"></i> Checkout
                    </h2>

                    <form action="{{ route('cart.process') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="shipping_name" class="block text-sm font-medium text-gray-400 mb-2">Full Name</label>
                                <input type="text" id="shipping_name" name="shipping_name" value="{{ Auth::user()->name }}"
                                       class="w-full rounded-lg border-gray-700 bg-gray-700 text-white focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="shipping_phone" class="block text-sm font-medium text-gray-400 mb-2">Phone Number</label>
                                <input type="text" id="shipping_phone" name="shipping_phone" value="{{ Auth::user()->phone ?? '' }}"
                                       class="w-full rounded-lg border-gray-700 bg-gray-700 text-white focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="shipping_address" class="block text-sm font-medium text-gray-400 mb-2">Shipping Address</label>
                            <textarea id="shipping_address" name="shipping_address" rows="3"
                                      class="w-full rounded-lg border-gray-700 bg-gray-700 text-white focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                                      required>{{ Auth::user()->address ?? '' }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-400 mb-3">Payment Method</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <label class="flex items-center justify-between bg-gray-700 p-4 rounded-lg border border-gray-600 cursor-pointer hover:border-green-500 transition">
                                    <div class="flex items-center">
                                        <input type="radio" name="payment_method" value="cash_on_delivery" class="text-green-500 focus:ring-green-500 h-4 w-4 bg-gray-700 border-gray-600" checked>
                                        <span class="ml-2">Cash on Delivery</span>
                                    </div>
                                    <i class="fas fa-money-bill-wave text-gray-400"></i>
                                </label>
                                <label class="flex items-center justify-between bg-gray-700 p-4 rounded-lg border border-gray-600 cursor-pointer hover:border-green-500 transition">
                                    <div class="flex items-center">
                                        <input type="radio" name="payment_method" value="credit_card" class="text-green-500 focus:ring-green-500 h-4 w-4 bg-gray-700 border-gray-600">
                                        <span class="ml-2">Credit Card</span>
                                    </div>
                                    <i class="fas fa-credit-card text-gray-400"></i>
                                </label>
                                <label class="flex items-center justify-between bg-gray-700 p-4 rounded-lg border border-gray-600 cursor-pointer hover:border-green-500 transition">
                                    <div class="flex items-center">
                                        <input type="radio" name="payment_method" value="paypal" class="text-green-500 focus:ring-green-500 h-4 w-4 bg-gray-700 border-gray-600">
                                        <span class="ml-2">PayPal</span>
                                    </div>
                                    <i class="fab fa-paypal text-gray-400"></i>
                                </label>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 mt-8">
                            <a href="{{ route('medication.index') }}" class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition text-center flex-1 flex items-center justify-center">
                                <i class="fas fa-arrow-left mr-2"></i> Continue Shopping
                            </a>
                            <button type="submit" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg transition font-medium flex-1 flex items-center justify-center">
                                <i class="fas fa-check-circle mr-2"></i> Place Order
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-4 mt-auto">
        <div class="container mx-auto px-4 text-center text-gray-400 text-sm">
            &copy; 2025 MediCare. All rights reserved.
        </div>
    </footer>

    <script>
        function incrementQuantity(button) {
            const input = button.previousElementSibling;
            const currentValue = parseInt(input.value);
            input.value = currentValue + 1;
            input.form.submit();
        }

        function decrementQuantity(button) {
            const input = button.nextElementSibling;
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
                input.form.submit();
            }
        }
    </script>
</body>
</html>
