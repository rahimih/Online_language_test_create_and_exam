<!DOCTYPE html>
<html lang="en">
<head>
    <title>L-TESTS / Writing corrections service</title>
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
                    <form method="post" enctype="multipart/form-data" id="regForm" action="{{route('Test_Start.writing_store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('POST')

                @foreach($ot_test_register as $test_registers)

                       <div class="tab">
                            <div class="row">
                                <div class="card">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title">{{ __('Writing corrections service ') }}</h4>
                                        <p class="card-category">{{ __('Confirm information') }}</p>
                                    </div>
                                    <div class="card-body ">
                                        <nav aria-label="breadcrumb" role="navigation">
                                            <ol class="breadcrumb">
                                                <button type="button" id="button1" class="btn btn-danger col-3">Information</button>
                                                <button type="button" id="button2" class="btn btn-link col-2 disabled" aria-disabled="true">part1</button>
                                                <button type="button" id="button3" class="btn btn-link col-2 disabled" aria-disabled="true">part2</button>
                                            </ol>
                                        </nav>
                                        <hr>

                              <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
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
                                            <div class="col">
                                                <label class="col-sm-12 col-form-label-f text-dark text-center" > {{$test_registers->TESTS_NAME}} </label>
                                            </div>
                                        </div>
                              <hr>
                              <div class="row">
                                           <label class="col-sm-8 col-form-label text-dark">{{ __('If your details are not correct, please inform the admin') }}</label>
                                           <label class="col-sm-8 col-form-label text-dark">{{ __('(Send Email to admin@L-tests.ir)') }}</label>
                                       </div>

                                </div>
                                </div>
                            </div>
                        </div>
                       @php
                        $i=$i+1;
                       @endphp

                       @if(($test_registers->Writing_corrections_part1)>0)
                         @php
                         $c1=($test_registers->Writing_corrections_part1);
                         $i=$i+1;
                         @endphp
                         <div class="tab">
                            <div class="row">
                                <div class="card ">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title">{{ __('Writing corrections service / PART1') }}</h4>
                                        <p class="card-category">{{ __('PART1') }}</p>
                                    </div>
                                    <div class="card-body ">
                                        <nav aria-label="breadcrumb" role="navigation">
                                            <ol class="breadcrumb">
                                                <button type="button" id="button1" class="btn btn-link col-3 disabled" aria-disabled="true">Information</button>
                                                <button type="button" id="button2" class="btn btn-danger col-4" >part1</button>
                                                <button type="button" id="button3" class="btn btn-link col-3 disabled" aria-disabled="true">part2</button>
                                            </ol>
                                        </nav>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <label class="col-sm-12 col-form-label-f text-dark text-right" > - جهت تصحیح رایتینگ به صورت واضح تر با امکان درج کامنت توسط مصحح، لطفا متون را به صورت تایپ شده و در قالب فایل word ارسال نمایید.</label>
                                                <label class="col-sm-12 col-form-label-f text-dark text-right" >- حداکثر تعداد کلمات مورد قبول در تسک اول ۲۳۰ کلمه و در تسک دوم ۳۲۰ کلمه می‌باشد.</label>
                                            </div>
                                        </div>
                                        <hr>
                                        @for($k=1;$k<=$c1;$k++)
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label-f">{{ __('Writing') }}{{$k}}</label>
                                            <div class="col-sm-6">
                                            <span class="btn btn-raised btn-round btn-default btn-file">
                                             <span class="fileinput-new">Select file</span>
                                             <input type="file" name=s1file{{$k}} id=s1file{{$k}} accept=".docx,.doc"  class="inputfile" />
                                        </span>
                                            </div>
                                        </div>
                                        <hr>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endif
                       @if(($test_registers->Writing_corrections_part2)>0)
                          @php
                              $c2=($test_registers->Writing_corrections_part2);
                             $i=$i+1;
                          @endphp
                           <div class="tab">
                             <div class="row">
                                <div class="card ">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title">{{ __('Writing corrections service / PART2 ') }}</h4>
                                        <p class="card-category">{{ __('PART2') }}</p>
                                    </div>
                                    <div class="card-body">
                                        <nav aria-label="breadcrumb" role="navigation">
                                            <ol class="breadcrumb">
                                                <button type="button" id="button1" class="btn btn-link col-3 disabled" aria-disabled="true">Information</button>
                                                <button type="button" id="button2" class="btn btn-link col-3 disabled" aria-disabled="true">part1</button>
                                                <button type="button" id="button3" class="btn btn-danger col-4" >part2</button>
                                            </ol>
                                        </nav>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <label class="col-sm-12 col-form-label-f text-dark text-right" > - جهت تصحیح رایتینگ به صورت واضح تر با امکان درج کامنت توسط مصحح، لطفا متون را به صورت تایپ شده و در قالب فایل word ارسال نمایید.</label>
                                                <label class="col-sm-12 col-form-label-f text-dark text-right" >- حداکثر تعداد کلمات مورد قبول در تسک اول ۲۳۰ کلمه و در تسک دوم ۳۲۰ کلمه می‌باشد.</label>
                                            </div>
                                        </div>
                                        <hr>
                                      @for($k=1;$k<=$c2;$k++)
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label-f">{{ __('Writing') }}{{$k}}</label>
                                            <div class="col-sm-6">
                                            <span class="btn btn-raised btn-round btn-default btn-file">
                                             <span class="fileinput-new">Select file</span>
                                         <input type="file" name=s2file{{$k}} id=s2file{{$k}} accept=".docx,.doc"  class="inputfile" />
                                        </span>
                                            </div>
                                        </div>
                                        <hr>
                                      @endfor
                                    </div>
                                </div>
                            </div>
                           </div>
                       @endif

                      <input name="test_r_id" id="input-test_id" value="{{$test_registers->TEST_REGISTER_ID}}"  type="text" hidden="true" readonly="true" />
                      <input name="test_id" id="input-test_id" value="{{$test_registers->TESTS_ID}}"  type="text" hidden="true" readonly="true" />
                      <input name="c1" id="input-c1" value="{{$c1}}" type="text" hidden="true" readonly="true"/>
                      <input name="c2" id="input-c2" value="{{$c2}}" type="text" hidden="true" readonly="true"/>

                    @endforeach

                        <div class="card-footer ml-auto mr-auto float-right overflow-auto">
                                <button type="button" class="btn btn-info btn-round" id="prevBtn" onclick="nextPrev(-1)" >{{ __('Previous') }}</button>
                                <button type="button" class="btn btn-info btn-round" id="nextBtn" onclick="nextPrev(1)">{{ __('Next') }}</button>
                            </div>

                        <div style="text-align:center;margin-top:40px;">
                            @for($j=1;$j<$i;$j++)
                                <span class="step"></span>
                                @endfor
                            </div>

                    </form>
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
                    document.getElementById("prevBtn").style.display = "none";
                    document.getElementById("nextBtn").innerHTML = "Submit";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                    document.getElementById("nextBtn").innerHTML = "Submit";
                }
                if (n == 1) {
                    document.getElementById("nextBtn").innerHTML = "Continue";
                }
                if (n == 2) {
                    document.getElementById("nextBtn").innerHTML = "sent";
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
