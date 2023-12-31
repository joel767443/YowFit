@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            {{ $meal->name }}
                            <span class="float-end">
                                <a href="{{ url('meals/' . $meal->id . '/edit') }}" class="btn btn-sm btn-secondary">Edit</a>
                                <a href="{{ route('meals.index') }}" class="btn btn-sm btn-secondary">Back to meals</a>
                            </span>
                        </h5>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <dl class="row">
                            <dt class="col-sm-3">Name:</dt>
                            <dd class="col-sm-9">{{ $meal->name }}</dd>

                            <dt class="col-sm-3">Description:</dt>
                            <dd class="col-sm-9">{{ $meal->description }}</dd>

                            <dt class="col-sm-3">Ingredients:</dt>
                            <dd class="col-sm-9">{{ $meal->ingredients }}</dd>

                            <dt class="col-sm-3">Instructions:</dt>
                            <dd class="col-sm-9">{{ $meal->instructions }}</dd>

                            <dt class="col-sm-3">Meal type:</dt>
                            <dd class="col-sm-9">{{ $meal->mealType->name }}</dd>

                        </dl>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
