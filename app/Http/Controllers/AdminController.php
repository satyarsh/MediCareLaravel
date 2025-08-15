<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdmin()
    {
        $users = User::all();

        return view('admin.panel', compact('users'));
    }
}
