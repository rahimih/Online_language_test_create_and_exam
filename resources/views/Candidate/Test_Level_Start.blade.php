<!DOCTYPE html>
<html lang="en">
<head>
    <title>Start Level Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

</head>
<style>
    .tab {
        display: none;
    }

    .step {
        height: 25px;
        width: 25px;
        margin: 0 2px;
        background-color: blue;
        border: none;
        border-radius: 70%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: blue;
    }

</style>

<body style="background-color:white;">
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <form method="post" id="regForm" action="{{route('Level_Start.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('POST')

                        <div class="tab">
                            <div class="row">
                                <div class="card ">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title">{{ __('Start Test ') }}</h4>
                                        <p class="card-category">{{ __('Confirm information') }}</p>
                                    </div>
                                    <div class="card-body">
                                        <nav aria-label="breadcrumb" role="navigation">
                                            <ol class="breadcrumb">
                                                <button type="button" id="button1" class="btn btn-danger col-3" >Your Information</button>
                                                <button type="button" id="button2" class="btn btn-link col-2 disabled" aria-disabled="true">Start Test</button>
                                            </ol>
                                        </nav>
                                        <hr>

                            @foreach($ot_test_defines as $test_defines)
                              <div class="row">
                                           &nbsp;&nbsp;&nbsp;&nbsp;
                                           <img style="width:25px" src="{{ asset('m_page') }}/images/confirm.png">
                                           <label class="col-sm-4 col-form-label text-dark ">{{ __('Confirm your details') }}</label>
                                       </div>
                              <div class="row">
                                        <label class="col-sm-4 col-form-label text-dark">{{ __('NAME') }}</label>
                                        <div class="col-sm-8">
                                            <label class="col-sm-12 col-form-label text-info">  {{ Auth::user()->fname }}  {{ Auth::user()->lname }} </label>
                                        </div>
                                    </div>
                              <div class="row">
                                        <label class="col-sm-4 col-form-label text-dark">{{ __('Age') }}</label>
                                        <div class="col-sm-8">
                                            <label class="col-sm-12 col-form-label text-info"> {{ Auth::user()->age }} </label>
                                        </div>
                                    </div>
                              <div class="row">
                                               <label class="col-sm-4 col-form-label text-dark">{{ __('Candidate Number') }}</label>
                                               <div class="col-sm-8">
                                                   <label class="col-sm-12 col-form-label text-info"> 000{{ Auth::user()->id }} </label>
                                               </div>
                                           </div>
                              <hr>
                              <div class="row">
                                           <label class="col-sm-8 col-form-label text-dark">{{ __('If your details are not correct, please inform the admin') }}</label>
                                           <label class="col-sm-8 col-form-label text-dark">{{ __('(Send Email to admin@L-tests.ir)') }}</label>
                                       </div>

                                @endforeach
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab">
                            <div class="row">
                                <div class="card ">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title">{{ __('Start Test ') }}</h4>
                                        <p class="card-category">{{ __('Information') }}</p>
                                    </div>
                                    <div class="card-body ">
                                        <nav aria-label="breadcrumb" role="navigation">
                                            <ol class="breadcrumb">
                                                <button type="button" id="button1" class="btn btn-link col-3 disabled" aria-disabled="true">Your Information</button>
                                                <button type="button" id="button2" class="btn btn-danger col-4" >Start Test</button>
                                            </ol>
                                        </nav>
                                        <hr>

                                        @foreach($ot_test_defines as $test_defines)

                                        <div class="row">
                                                <div class="col">
                                                <label class="col-sm-12 col-form-label text-info" >{{ __('TEST NAME:') }} {{$test_defines->TESTS_NAME}} </label>
                                                </div>
                                                <div class="col">
                                                    <label class="col-sm-12 col-form-label text-info" >{{ __('TEST KIND:') }} {{$test_defines->TYPE}} /  {{$test_defines->SUBGROUP_TEST_NAME}} </label>
                                                </div>
                                            </div>
                                        <hr>

                                        @foreach($ot_test_qpackages as $test_qpackages)
                                             <div class="row">
                                                <div class="col">
                                                  <div class="col-sm-8">
                                                   <label class="col-sm-12 col-form-label text-info"> {{$test_qpackages->SKILL_TYPE}}  </label>
                                                  </div>
                                                  </div>
                                                <div class="col">
                                                 <div class="col-sm-10">
                                                  <label class="col-sm-12 col-form-label text-info"> {{$test_qpackages->Question_Numbers}} Questions </label>
                                                 </div>
                                                </div>
                                                <div class="col">
                                                <div class="col-sm-8">
                                                <label class="col-sm-12 col-form-label text-info"> {{$test_qpackages->Time_Period}} Minutes  </label>
                                                </div>
                                                </div>
                                             </div>
                                           @endforeach
                                        @endforeach

                                        <input name="test_id" id="input-test_id" value="{{$test_defines->TESTS_ID}}"  type="text" hidden="true" readonly="true" />
                                        <input name="tn" id="input-tn" value="{{$test_defines->TESTS_NAME}}"  type="text" hidden="true" readonly="true" />
                                        <input name="mt" id="input-mt" value="{{$test_defines->MAIN_TEST_ID}}"  type="text" hidden="true" readonly="true" />
                                        <input name="st" id="input-st" value="{{$test_defines->SUBGROUP_TEST_ID}}"  type="text" hidden="true" readonly="true" />

                                        <hr>
                                        <div class="row">
                                                    <label class="col-sm-12 col-form-label text-dark">{{ __('It is very important to be honest about how sure you are. Your score depends on the answers you give.') }}</label>
                                                </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-sm-12 col-form-label text-dark">{{ __('At the end of test your level will be assessed at a CEF level (A2 to C2)') }}</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-footer ml-auto mr-auto float-right overflow-auto">
                                <button type="button" class="btn btn-info btn-round" id="nextBtn" onclick="nextPrev(1)">{{ __('Next') }}</button>
                            </div>

                        <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>

                    </form>
                  </div>
                </div>
            </div>
        </div>
</div>
<script>
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab
            function showTab(n) {
                // This function will display the specified tab of the form...
                var x = document.getElementsByClassName("tab");
                x[n].style.display = "block";
                if (n == 0) {
                    document.getElementById("nextBtn").innerHTML = "My Details are Correct";
                }
                if (n == 1) {
                    document.getElementById("nextBtn").innerHTML = "Continue";
                }
                if (n == 2) {
                    document.getElementById("nextBtn").innerHTML = "Start Test";
                    document.getElementById("nextBtn").style.display = "inline";
                }
                fixStepIndicator(n)
            }

            function nextPrev(n) {
                // This function will figure out which tab to display
                var x = document.getElementsByClassName("tab");
                // Exit the function if any field in the current tab is invalid:
                if (n == 1 && !validateForm()) return false;
                // Hide the current tab:
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                // if you have reached the end of the form...
                if (currentTab >= x.length) {
                    // ... the form gets submitted:
                    document.getElementById("regForm").submit();
                    return false;
                }
                // Otherwise, display the correct tab:
                showTab(currentTab);
            }

            function validateForm() {
                valid = true;
                // If the valid status is true, mark the step as finished and valid:
                if (valid) {
                    document.getElementsByClassName("step")[currentTab].className += " finish";
                }
                return valid; // return the valid status
            }

            function fixStepIndicator(n) {
                // This function removes the "active" class of all steps...
                var i, x = document.getElementsByClassName("step");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" active", "");
                }
                //... and adds the "active" class on the current step:
                x[n].className += " active";
            }

            (function (global) {

                if(typeof (global) === "undefined")
                {
                    throw new Error("window is undefined");
                }

                var _hash = "!";
                var noBackPlease = function () {
                    global.location.href += "#";

                    // making sure we have the fruit available for juice....
                    // 50 milliseconds for just once do not cost much (^__^)
                    global.setTimeout(function () {
                        global.location.href += "!";
                    }, 50);
                };

                // Earlier we had setInerval here....
                global.onhashchange = function () {
                    if (global.location.hash !== _hash) {
                        global.location.hash = _hash;
                    }
                };

                global.onload = function () {

                    noBackPlease();

                    // disables backspace on page except on input fields and textarea..
                    document.body.onkeydown = function (e) {
                        var elm = e.target.nodeName.toLowerCase();
                        if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                            e.preventDefault();
                        }
                        // stopping event bubbling up the DOM tree..
                        e.stopPropagation();
                    };

                };

            })(window);

        </script>

</body>
</html>

