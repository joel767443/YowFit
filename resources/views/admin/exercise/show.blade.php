@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            {{ $exercise->name }}
                            <span class="float-end">
                                <a href="{{ url('exercises/' . $exercise->id . '/edit') }}" class="btn btn-sm btn-secondary">Edit</a>
                                <a href="{{ route('exercises.index') }}" class="btn btn-sm btn-secondary">Back to exercises</a>
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
                            <dd class="col-sm-9">{{ $exercise->name }}</dd>

                            <dt class="col-sm-3">Description:</dt>
                            <dd class="col-sm-9">{{ $exercise->description }}</dd>

                            <dt class="col-sm-3">Type:</dt>
                            <dd class="col-sm-9">{{ $exercise->exerciseType->name }}</dd>

                            @if($exercise->link)
                            <dt class="col-sm-3">Link:</dt>
                            <dd class="col-sm-9">{{ $exercise->link }}</dd>
                            @endif

                        </dl>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
