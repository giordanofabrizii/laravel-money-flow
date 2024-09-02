@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a class="btn btn-primary" href="{{Route('transactions.create')}}">New Transaction</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Buttons</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    @if (Auth::user()->id == $transaction['user_id'])
                        <tr>
                            <td>{{ $transaction['id'] }}</td>
                            <td>{{ $transaction['user_id'] }}</td>
                            <td>
                                @if ($transaction['type'] == 0)
                                    -{{ $transaction['amount'] }}
                                @else
                                    +{{ $transaction['amount'] }}
                                @endif
                            </td>
                            <td>{{ $transaction['date'] }}</td>
                            <td>{{ $transaction['category'] }}</td>
                            <td><a class="btn btn-primary" href="{{ Route('transactions.show',$transaction) }}">Show</a></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
