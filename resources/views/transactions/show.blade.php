@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Transaction ID: {{ $transaction['id'] }}</p>
        <p>User ID: {{ $transaction['user_id'] }}</p>
        <p>Amount:
            @if ($transaction['type'] == 0)
                -{{ $transaction['amount'] }}
            @else
                +{{ $transaction['amount'] }}
            @endif
        </p>
        <p>Date: {{ $transaction['date'] }}</p>
        <p>Category: {{ $transaction['category'] }}</p>
        <p>Notes: {{ $transaction['notes'] }}</p>
        <div>
            @if (Auth::user()->id == $transaction['user_id'])
                <a class="btn btn-warning" href="{{ Route('transactions.edit',$transaction) }}">Edit</a>
                <a class="btn btn-danger" href="{{ Route('transactions.destroy',$transaction) }}">Delete</a>
            @endif
        </div>
    </div>
@endsection
