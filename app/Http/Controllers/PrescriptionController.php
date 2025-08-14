<?php

namespace App\Http\Controllers;

use App\Models\Prescriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescriptions::with(['medication', 'doctor', 'patient'])
            ->where('PatientID', Auth::id())
            ->orderBy('PrescriptionDate', 'desc')
            ->get();

        return view('prescription', compact('prescriptions'));
    }
}
