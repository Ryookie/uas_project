<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if user is authenticated
        if (!$user) {
            // Redirect to login if not authenticated
            return redirect()->route('login')->withErrors(['message' => 'Please log in first']);
        }

        // Retrieve user's transactions
        $transactions = $user->transactions;

        // Calculate balance (assuming account balance is based on transactions)
        $balance = $transactions->sum('amount');

        // Pass data to the view
        return view('dashboard', compact('balance', 'transactions'));
    }
    public function login()
    {
        return view('login'); 
    }
    public function register()
    {
        return view('register');
    }
}
