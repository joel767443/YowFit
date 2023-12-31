@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Log weight</h5>
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

                        <form action="{{ route('weight-log.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="weight">Weight:</label>
                                <input type="text" class="form-control" id="weight" name="weight" value="">
                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user->id }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="recorded_at">Recorded at:</label>
                                <input type="text" class="form-control" id="recorded_at" name="recorded_at" value="">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
