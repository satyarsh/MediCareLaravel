<?php

namespace App\Http\Controllers;

use App\Models\Medications;

class HomeController extends Controller
{
    public function index()
    {
        $featuredMedications = Medications::with('manufacturer')
            ->where('Stock', '>', 0)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('index', compact('featuredMedications'));
    }
}
