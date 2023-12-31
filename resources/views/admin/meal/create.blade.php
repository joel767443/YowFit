@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Create a meal</h5>
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

                        <form action="{{ route('meals.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Meal:</label>
                                <input type="text" class="form-control" id="name" name="name" value="">
                            </div>
                            <div class="form-group mb-2">
                                <label for="meal_type">Meal Type:</label>
                                <select class="form-control" id="meal_type_id" name="meal_type_id">
                                    @foreach($mealTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="ingredients">Ingredients:</label>
                                <textarea class="form-control" id="ingredients" name="ingredients"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="instructions">Instructions:</label>
                                <textarea class="form-control" id="instructions" name="instructions"></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
