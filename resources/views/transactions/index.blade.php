@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction['id'] }}</td>
                        <td>{{ $transaction['user_id'] }}</td>
                        <td>{{ $transaction['amount'] }}</td>
                        <td>{{ $transaction['date'] }}</td>
                        <td>{{ $transaction['type'] }}</td>
                        <td>{{ $transaction['category'] }}</td>
                        <td>{{ $transaction['notes'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
