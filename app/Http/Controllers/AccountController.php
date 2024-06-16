<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $account = $user->account;
        return view('account.index', compact('account'));
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'recipient_id' => 'required|exists:accounts,id',
        ]);

        $user = auth()->user();
        $account = $user->account;

        // Deduct from sender
        $account->balance -= $request->amount;
        $account->save();

        // Add to recipient
        $recipient = \App\Models\Account::find($request->recipient_id);
        $recipient->balance += $request->amount;
        $recipient->save();

        // Log transaction
        \App\Models\Transaction::create([
            'account_id' => $account->id,
            'amount' => -$request->amount,
            'type' => 'debit'
        ]);

        \App\Models\Transaction::create([
            'account_id' => $recipient->id,
            'amount' => $request->amount,
            'type' => 'credit'
        ]);

        return back()->with('success', 'Transfer successful!');
    }
}
