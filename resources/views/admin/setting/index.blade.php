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
            showTab('exercise');
            // showTab('resting');
        });

        /**
         *
         * @param formData
         * @param url
         */
        function post(formData, url = 'settings') {

            return new Promise(function(resolve, reject) {
                $.ajax({
                    url: '/' + url + '/',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        resolve(response);
                    },
                    error: function (error) {
                        // console.log(error);
                        // Handle error response
                    }
                });
            })
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

        $('#saveExercise').click(function () {

            let timeFrom = $("#start_time").val()
            let timeTo = $("#end_time").val()
            let data = {
                'start_time': timeFrom,
                'end_time': timeTo,
                'exercise_id': $("#exercise_id").val(),
                'schedule_id': 1,  // Adjust this as needed
            }

            post(data, 'exerciseTimes').then(function (response) {
                console.log(response.exerciseTime.start_time)
                $('#exerciseTime').append("<div><b>From :</b> "+timeFrom+" <b>To :</b> "+timeTo+" <b>Type : "+response.exerciseTime.exercise+"</div>")
            })
        })

        $('#showForm').click(function (){
            $('#formDiv').show()
        })
    </script>
@endsection
