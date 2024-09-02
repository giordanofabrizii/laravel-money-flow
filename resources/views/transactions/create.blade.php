@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form action="{{ Route('transactions.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="amount">Transaction amount</label>
                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter amount" ">
                        @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date" id="date" ">
                        @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Transaction Type</label>
                        <select class="form-control" name="type" id="type" placeholder="Enter type" ">
                            <option selected value="0">Outcome</option>
                            <option value="1">Income</option>
                        </select>
                        @error('type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" name="category" id="category" placeholder="Enter category" ">
                        @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="notes">Add Notes</label>
                        <input type="text" class="form-control" name="notes" id="notes" placeholder="Write notes" ">
                        @error('notes')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Add Transaction</button>
            </div>
        </div>
    </div>
@endsection
