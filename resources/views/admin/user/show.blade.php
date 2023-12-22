@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            {{ $user->name }}
                            <span class="float-end">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Back to Users</a>
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
                            <dd class="col-sm-9">{{ $user->name }}</dd>

                            <dt class="col-sm-3">Email:</dt>
                            <dd class="col-sm-9">{{ $user->email }}</dd>

                            <dt class="col-sm-3">Created At:</dt>
                            <dd class="col-sm-9">{{ $user->created_at }}</dd>
                        </dl>

                            <h2>Weekly Calendar</h2>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Activity</th>
                                    <th>Description</th>
                                    <th>url</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($calendarEntries as $record)
                                <tr class="{{ $record->isCurrentTimeBetween ? 'table-success' : ''}}">
{{--                                    <td>{{ $record->isCurrentTimeBetween }}</td>--}}
                                    <td>{{ $record->start_time .'-'. $record->end_time }}</td>
                                    <td> {{ $record->activityType->title }}</td>
                                    <td>{{ $record->activityType->description }}</td>
                                    <td>{{ $record->activityType->url }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
