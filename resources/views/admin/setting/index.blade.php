@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Settings</h5>
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

                        <form id="wizardForm" action="" method="post">
                            @csrf
                            @include('admin.setting.partials.resting-form')
                            @include('admin.setting.partials.exercise-form-index')
                            @include('admin.setting.partials.meals-form-index')
                            @include('admin.setting.partials.work-form-index')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let setting_id = 1

        function showTab(tabId) {
            $('.tab').hide();
            $('#' + tabId).show();
        }

        function nextStep(currentTab, nextTab) {
            if (typeof window[currentTab] === 'function') {
                window[currentTab]();
            }
            showTab(nextTab);
        }

        function prevStep(currentTab, prevTab) {
            showTab(prevTab);
        }

        $(document).ready(function () {
            showTab('meals');
            // showTab('resting');
        });

        function post(formData) {

            $.ajax({
                url: '/settings/' + setting_id,
                type: 'POST',
                data: formData,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response);
                    // Handle success response
                },
                error: function (error) {
                    // console.log(error);
                    // Handle error response
                }
            });
        }

        function resting() {
            let hours_sleep = parseInt($("#hours_sleep").val(), 10);
            let sleeping_time = $("#sleeping_time").val();

            // Parse sleeping_time as a time
            let sleepTime = new Date('1970-01-01T' + sleeping_time + 'Z');

            // Add hours_sleep to the hours part
            sleepTime.setHours(sleepTime.getHours() + hours_sleep);

            // Format the result as HH:mm
            let wakeup_time = sleepTime.toISOString().substr(11, 5);

            let data = {
                'hours_sleep': hours_sleep,
                'sleeping_time': sleeping_time,
                'wakeup_time': wakeup_time,
                'weighing_frequency': $("#weighing_frequency").val(),
            };
            post(data)
        }

        function exercise() {

            let exerciseTimes = [];

            ['one', 'two', 'three'].forEach(function (index) {
                let fromValue = $("#exercise_time_from_" + index).val();
                let toValue = $("#exercise_time_to_" + index).val();
                let exerciseIdValue = $("#exercise_id_" + index).val();

                // Create an object for each index and push it to the array
                exerciseTimes.push({
                    'exercise_time_from': fromValue,
                    'exercise_time_to': toValue,
                    'exercise_id': exerciseIdValue,
                    'schedule_id': 1,  // Adjust this as needed
                });
            });

            let data = {
                'exercises_per_day': $('#exercises_per_day').val(),
                'exercise_times': JSON.stringify(exerciseTimes),
            }

            post(data)
        }

        function meals() {
            let mealTimes = [];

            ['one', 'two', 'three'].forEach(function (index) {
                let fromValue = $("#meal_time_from_" + index).val();
                let toValue = $("#meal_time_to_" + index).val();
                let mealIdValue = $("#meal_id_" + index).val();

                // Create an object for each index and push it to the array
                mealTimes.push({
                    'meal_time_from': fromValue,
                    'meal_time_to': toValue,
                    'meal_id': mealIdValue,
                    'schedule_id': 1,  // Adjust this as needed
                });
            });

            let data = {
                'meals_per_day': $('#meals_per_day').val(),
                'eating_times': JSON.stringify(mealTimes),
            }

            post(data)
        }

        function work() {
            alert('work')
        }
    </script>
@endsection
