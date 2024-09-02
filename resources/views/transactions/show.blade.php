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
        <p>Category: <i class="{{ $transaction->category->icon }} mx-2"></i>{{ $transaction->category->name }}</p>
        <p>Notes: {{ $transaction['notes'] }}</p>
        <div class="row d-flex flex-row">
            @if (Auth::user()->id == $transaction['user_id'])
                <a class="col-3 btn btn-warning" href="{{ Route('transactions.edit',$transaction) }}">Edit</a>
                <form class="col-3" action="{{ route('transactions.destroy', $transaction) }}" method="POST" >
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        </div>
    </div>
@endsection
