@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-start">Users</h5>
                        <span class="float-end">
                             <span class="float-end">
                                <a href="{{ url('schedules/' . $result['id'] . '/edit') }}" class="btn btn-sm btn-secondary">Delete</a>
                                <a href="{{ url('schedules/' . $result['id'] . '/edit') }}" class="btn btn-sm btn-secondary">Edit</a>
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Back to Schedules</a>
                            </span>
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($result as $time => $exerciseTime)
                            <tr>
                                <td>{{ $exerciseTime }} {{ $result['id'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    <div style="padding: 10px; margin-bottom: -12px">{{ $users->appends(request()->input())->links() }}</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

