@extends('layouts.app')

@section('content')
    @if ($transaction->user_id == Auth::user()->id )
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <form action="{{ Route('transactions.update',$transaction) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="amount">Transaction amount</label>
                            <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter amount" value="{{ old('amount', $transaction->amount) }}" >
                            @error('amount')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" id="date" value="{{ old('date', $transaction->date) }}">
                            @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Transaction Type</label>
                            <select class="form-control" name="type" id="type" placeholder="Enter type" >
                                <option
                                {{ old('type', $transaction->type) == 0 ? "selected" : "" }} value="0">Outcome</option>
                                <option
                                {{ old('type', $transaction->type) == 1 ? "selected" : "" }} value="1">Income</option>
                            </select>
                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" name="category" id="category" placeholder="Enter category" value="{{ old('category', $transaction->category) }}">
                            @error('category')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="notes">Add Notes</label>
                            <input type="text" class="form-control" name="notes" id="notes" placeholder="Write notes" value="{{ old('notes', $transaction->notes) }}">
                            @error('notes')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Edit Transaction</button>
                </div>
            </div>
        </div>
    @else
        <h1>You can only edit your transaction</h1>
    @endif
@endsection
