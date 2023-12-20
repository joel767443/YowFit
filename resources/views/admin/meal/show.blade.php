@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Viewing {{ $meal->name }}
                            <span class="float-end">
                                <a href="{{ route('meals.index') }}" class="btn btn-sm btn-secondary">Back to Meals</a>
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

                                <dt class="col-sm-3">Created At:</dt>
                                <dd class="col-sm-9">{{ $meal->created_at }}</dd>

                                <dt class="col-sm-3">Updated At:</dt>
                                <dd class="col-sm-9">{{ $meal->updated_at }}</dd>
                            </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
