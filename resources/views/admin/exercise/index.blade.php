@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-start">Exercises</h5>
                        <span class="float-end">
                            <form autocomplete="off" action="{{ route('exercises.index') }}" method="GET" class="form-inline">
                                <input class="form-control form-control-sm" type="text" name="search" value=""
                                       style="display: inline-block !important;width: auto !important;">
                                <button class="btn btn-sm btn-success">Go</button>
                            </form>
                        </span>
                    </div>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-striped table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exercises as $exercise)
                                <tr>
                                    <td>{{ $exercise->name }}</td>
                                    <td>{{ $exercise->description }}</td>
                                    <td align="right">
                                        <a href="{{ route('exercises.show', $exercise->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('exercises.edit', $exercise->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <div style="padding: 10px; margin-bottom: -12px">{{ $exercises->appends(request()->input())->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
