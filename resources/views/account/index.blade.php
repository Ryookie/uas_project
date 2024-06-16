@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Account Balance: {{ $account->balance }}</h1>
    <form action="{{ route('account.transfer') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="recipient_id">Recipient Account ID:</label>
            <input type="text" name="recipient_id" id="recipient_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="text" name="amount" id="amount" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Transfer</button>
    </form>
</div>
@endsection
