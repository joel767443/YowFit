@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-start">Exercise Types</h5>
                        <span class="float-end">
                            <form action="{{ route('exercise-types.index') }}" method="GET" class="float-end form-inline">
                                <input autocomplete="off" class="form-control form-control-sm" type="text" name="search" value="{{ old('search') }}"
                                       style="display: inline-block !important;width: auto !important;">
                                <button class="btn btn-sm btn-success">Go</button>
                                <a href="{{ route('exercise-types.create') }}" class="btn btn-sm btn-success">Add</a>
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
                            <tbody>
                            @foreach($exerciseTypes as $exerciseType)
                                <tr>
                                    <td>{{ $exerciseType->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <div style="padding: 10px; margin-bottom: -12px">{{ $exerciseTypes->appends(request()->input())->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
