@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-start">Users</h5>
                        <span class="float-end">
                            <form action="{{ route('users.index') }}" method="GET" class="form-inline">
                                <input class="form-control form-control-sm" type="text" name="search" value="{{ old('search') }}"
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
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->userType->name }}</td>
                                    <td>{{ $user->userStatus->name }}</td>
                                    <td align="right">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <div style="padding: 10px; margin-bottom: -12px">{{ $users->appends(request()->input())->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
