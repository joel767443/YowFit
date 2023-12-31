@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header float-start">
                        <h5 class="float-start">Weight Log</h5>
                        <span class="float-end">
                            <a href="{{ route('weight-log.index') }}" class="btn btn-sm btn-success">Log</a>
                        </span>
                    </div>

                        <canvas id="weightChart" width="400" height="150"></canvas>

                        <script>
                            var ctx = document.getElementById('weightChart').getContext('2d');
                            var weightData = @json($weightData);

                            var labels = weightData.map(function (data) {
                                return data.created_at;
                            });

                            var weights = weightData.map(function (data) {
                                return data.weight;
                            });

                            var chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Weight Tracking',
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        data: weights,
                                    }]
                                },
                                options: {
                                    scales: {
                                        x: [{
                                            type: 'time',
                                            time: {
                                                unit: 'day',
                                            },
                                            title: {
                                                display: true,
                                                text: 'Date',
                                            },
                                        }],
                                        y: [{
                                            title: {
                                                display: true,
                                                text: 'Weight (kg)',
                                            },
                                        }],
                                    },
                                },
                            });
                        </script>

                </div>
            </div>
        </div>
    </div>
@endsection
