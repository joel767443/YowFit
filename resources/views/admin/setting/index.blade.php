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

                                <div class="tab" id="resting">
                                    <h5>Resting</h5>
                                    <p>How many hours do you want to sleep</p>
                                    <input type="text" name="sleep-hours" class="form-control">
                                    <p>What time do you want to sleep</p>
                                    <input type="text" name="sleep-hours" class="form-control">
                                    <button type="button" class="btn btn-primary mt-3" onclick="nextStep('resting', 'exercise')">Next</button>
                                </div>

                                <div class="tab" id="exercise">
                                    <h5>Exercises</h5>
                                    <p>How many times can you exercise a day</p>
                                    <input type="text" name="exercise_input" class="form-control">
                                    <p>When can you exercise</p>
                                    <input type="text" name="exercise_input" class="form-control">
                                    <button type="button" class="btn btn-secondary mr-2 mt-3" onclick="prevStep('exercise', 'resting')">Previous</button>
                                    <button type="button" class="btn btn-primary mt-3" onclick="nextStep('exercise', 'meals')">Next</button>
                                </div>

                                <div class="tab" id="meals">
                                    <h5>Meals</h5>
                                    <p>What times are you going to eat</p>
                                    <input type="text" name="meals_input" class="form-control">
                                    <button type="button" class="btn btn-secondary mr-2 mt-3" onclick="prevStep('meals', 'exercise')">Previous</button>
                                    <button type="button" class="btn btn-primary mt-3" onclick="nextStep('meals', 'work')">Next</button>
                                </div>

                                <div class="tab" id="work">
                                    <h5>Work</h5>
                                    <p>What times are you going to eat</p>
                                    <input type="text" name="meals_input" class="form-control">
                                    <button type="button" class="btn btn-secondary mr-2 mt-3" onclick="prevStep('work', 'meals')">Previous</button>
                                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                                </div>

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function showTab(tabId) {
            $('.tab').hide();
            $('#' + tabId).show();
        }

        function nextStep(currentTab, nextTab) {
            // Add validation logic if needed before proceeding to the next step

            showTab(nextTab);
        }

        function prevStep(currentTab, prevTab) {
            showTab(prevTab);
        }

        $(document).ready(function () {
            showTab('resting');
        });
    </script>
@endsection
