@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form action="{{ Route('categories.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Transaction name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" >
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon class name</label>
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="Enter name">
                        @error('icon')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Add Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
