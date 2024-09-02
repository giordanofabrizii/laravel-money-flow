@extends('layouts.app')

@section('content')
    @if (Auth::user() === null)
    <div class="container">
        <h1 class="text-center">You have to log in or register</h1>
    </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{Route('categories.create')}}">New category</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Buttons</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category['id'] }}</td>
                            <td>{{ $category['name'] }}</td>
                            <td><i class="{{ $category['icon'] }}"></i></td>
                            <td>
                                <div class="row d-flex flex-row">
                                    <a class="btn btn-warning col-1" href="{{ Route('categories.edit', $category) }}">Edit</a>
                                    <form class="col-3" action="{{ route('categories.destroy', $category) }}" method="POST" >
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
