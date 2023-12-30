@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $exercise->name }}</h5>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('exercises.update', $exercise->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $exercise->name }}" >
                            </div>
                            <div class="form-group mb-2">
                                <label for="email">Description:</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ $exercise->description }}" >
                            </div>
                            <div class="form-group mb-2">
                                <label for="email">Link:</label>
                                <input type="text" class="form-control" id="link" name="link" value="{{ $exercise->link }}">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Update exercise</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
