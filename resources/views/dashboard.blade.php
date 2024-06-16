<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h4>Account Balance: ${{ number_format($balance, 2) }}</h4>
                    <h5>Recent Transactions:</h5>
                    <ul>
                        @foreach($transactions as $transaction)
                            <li>{{ $transaction->created_at }} - ${{ number_format($transaction->amount, 2) }} - {{ $transaction->type }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
