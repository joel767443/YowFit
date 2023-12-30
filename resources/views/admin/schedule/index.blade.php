@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-start">Schedule for {{ $currentDayOfWeek . " " . now()->format('d-m-Y')  }}</h5>
                        <span class="float-end">
                             <span class="float-end">
                                <a href="{{ url('schedules/' . $schedule->id . '/edit') }}" class="btn btn-sm btn-secondary">Edit</a>
                            </span>
                        </span>

                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Time</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($result as $time => $exerciseTime)
                            <tr>
                                <td>{{ $time }}</td>
                                <td>{{ $exerciseTime }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

