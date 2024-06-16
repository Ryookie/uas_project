<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerServiceController extends Controller
{
    public function index()
    {
        $faq = [
            'How to reset password?' => 'Click on "Forgot Password" on the login page and follow the instructions.',
            'How to transfer money?' => 'Go to your account page, enter recipient account ID and amount, and click transfer.',
            // Add more FAQs here
        ];

        return view('customer_service.index', compact('faq'));
    }
}
