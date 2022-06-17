<!DOCTYPE html>
<html lang="en">
<head>
    <title>READING</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
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
            <div class="col-md-12">

                <form method="post"  id="regForm" action="{{route('Test_Start.store_r') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('POST')

                    <input name="ID2" id="input-tn" value={{$id2}}  type="text" hidden="true" readonly="true" />
                    <input name="TESTID" id="input-tn" value={{$TEST_ID}}  type="text" hidden="true" readonly="true" />
                    <input name="TESTRID" id="input-tn" value={{$TEST_R_ID}}  type="text" hidden="true" readonly="true" />
                    <input name="tn" id="input-tn" value={{$tn}}  type="text" hidden="true" readonly="true" />
                    <input name="IDT" id="input-IDT" value={{$IDT}}  type="text" hidden="true" readonly="true" />
                    <input name="mt" id="input-mt" value="{{$MT}}"  type="text" hidden="true" readonly="true" />
                    <input name="st" id="input-st" value="{{$ST}}"  type="text" hidden="true" readonly="true" />


                @if ($kind==1)
                  <div class="row">
                                         <div class="col-md-6 ml-auto mr-auto">
                                            <div class="card card-nav-tabs">
                                                <h4 class="card-header card-header-info text-center">TIMER</h4>
                                                <div class="card-body">
                                                    <nav aria-label="breadcrumb" role="navigation">
                                                        <ol class="breadcrumb">
                                                            <button type="button" class="btn btn-info col-12">
                                                            <h2 class="w3-white text-center" style="text-shadow:1px 1px 0 #444" id="timer"> 0 </h2>
                                                    <div class="progress-container progress-info">
                                                        <span class="progress-badge"></span>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-info" id="myBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                            </button>
                                                        </ol>
                                                    </nav>
                                                    <hr>

                                    </div>
                                </div>
                            </div>
                        </div>
                      @foreach($ot_packages_sections as $packages_sections)
                        <div class="tab">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-danger">
                                        <div class="card-text">
                                            <h4 class="card-title">{{$tn}} &nbsp;&nbsp;  </br> READING   </h4>
                                        </div>
                                    </div>
                                <div class="card-body">
                                    <div class = "text-info ">
                                        <h3> READING PASSAGE {{$i}}</h3>
                                         <i>  You should about 20 minutes on </i> <strong> Questions {{$packages_sections->QUESTION_FROMS}} - {{$packages_sections->QUESTION_TOS}} </strong> , <i> which are based on Reading passage below </i> </h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-color" id=R{{$i}}>
                                            {!!$packages_sections->HTML_READING!!}
                                        </div>

                                        <div class="col-nocolor">
                                    @foreach($ot_section_parts as $section_parts)
                                        @if ($packages_sections->OT_PS_ID==$section_parts->OT_PS_ID)
                                            <h4> Questions {{$section_parts->QUESTION_FROMP}} - {{$section_parts->QUESTION_TOP}} </h4>
                                            {!!$section_parts->HEADER!!}
                                            @if ($section_parts->FILE_KINDS=='I')
                                                 <img src = "picture/{{$packages_sections->QUESTIONS_PACKAGES_ID}}/{{$section_parts->FILE_NAMES}}"  style="width: 500px ;height="400px"; >
                                            @endif
                                            {!!$section_parts->HTML_QUESTIONS!!}
                                            </br>
                                        @endif
                                    @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                                </div>
                            @php
                            $i=$i+1
                          @endphp
                    @endforeach

                          <div class="card-footer ml-auto mr-auto float-right overflow-auto">
                              <button type="button" class="btn btn-info btn-round" id="prevBtn" onclick="nextPrev(-1)" >{{ __('Previous') }}</button>
                              <button type="button" class="btn btn-info btn-round" id="nextBtn" onclick="nextPrev(1)">{{ __('next') }}</button>
                          </div>

                          <div style="text-align:center;margin-top:40px;">
                              <span class="step"></span>
                              <span class="step"></span>
                              <span class="step"></span>
                              <span class="step"></span>
                          </div>

                    @endif
                @if ($kind==2)
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <div class="card card-nav-tabs">
                                    <h4 class="card-header card-header-info text-center">TIMER</h4>
                                    <div class="card-body">
                                        <nav aria-label="breadcrumb" role="navigation">
                                            <ol class="breadcrumb">
                                                <button type="button" class="btn btn-info col-12">
                                                <h2 class="w3-white text-center" style="text-shadow:1px 1px 0 #444" id="timer"> 0 </h2>
                                        <div class="progress-container progress-info">
                                            <span class="progress-badge"></span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-info" id="myBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                                </div>
                                            </div>
                                        </div>
                                                </button>
                                            </ol>
                                        </nav>
                                        <hr>

                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach($ot_packages_sections as $packages_sections)
                        @foreach($ot_section_parts as $section_parts)
                        @if ($packages_sections->OT_PS_ID==$section_parts->OT_PS_ID)
                                    @if ($section_parts->HTML_READINGS!='')
                                    <div class="tab">
                                            <div class="card">
                                                <div class="card-header card-header-text card-header-danger">
                                                    <div class="card-text">
                                                    @if ($packages_sections->OT_PS_ID==$section_parts->OT_PS_ID)
                                                    <h4 class="card-title">{{$packages_sections->PARTS_NAME}} &nbsp;&nbsp;  </br> <strong> Questions {{$packages_sections->QUESTION_FROMS}} - {{$packages_sections->QUESTION_TOS}} </strong>  </h4>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="card">
                                                            <div class="card-body">
                                                        <h3> READING PASSAGE {{$i}}</h3>
                                                        {!!$section_parts->HTML_READINGS!!}
                                                        @php
                                                            $i=$i+1
                                                        @endphp
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5">
                                                        <div class="card card-nav-tabs">
                                                            <div class="card-body">

                                                            <h4>Questions {{$section_parts->QUESTION_FROMP}} - {{$section_parts->QUESTION_TOP}}</h4>
                                                                {!!$section_parts->HEADER!!}
                                                                @if ($section_parts->FILE_KINDS=='I')
                                                                <img src = "picture/{{$packages_sections->QUESTIONS_PACKAGES_ID}}/{{$section_parts->FILE_NAMES}}"  style="width: 500px ;height="400px"; >
                                                                @endif
                                                                {!!$section_parts->HTML_QUESTIONS!!}
                                                                </br>
                                                               @foreach($ot_section_parts2 as $section_parts2)
                                                                @if ($section_parts->OT_PS_ID==$section_parts2->OT_PS_ID)
    `                                                            <h4>Questions {{$section_parts2->QUESTION_FROMP}} - {{$section_parts2->QUESTION_TOP}}</h4>
                                                                 {!!$section_parts2->HEADER!!}
                                                                    @if ($section_parts2->FILE_KINDS=='I')
                                                                        <img src = "picture/{{$packages_sections->QUESTIONS_PACKAGES_ID}}/{{$section_parts2->FILE_NAMES}}"  style="width: 500px ;height="400px"; >
                                                                        @endif
                                                                 {!!$section_parts2->HTML_QUESTIONS!!}
                                                                 </br>
                                                                @endif
                                                               @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    </div>

                                                </div>
                                            </div>
                                    </div>
                                   @endif
                                 @endif
                            @endforeach
                            @endforeach

                            <div class="card-footer ml-auto mr-auto float-right overflow-auto">
                                <button type="button" class="btn btn-info btn-round" id="prevBtn" onclick="nextPrev(-1)" >{{ __('Previous') }}</button>
                                <button type="button" class="btn btn-info btn-round" id="nextBtn" onclick="nextPrev(1)">{{ __('next') }}</button>
                            </div>

                            <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>
                    @endif

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
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
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
    // timer
    var distance = {{$time}}*60*1000;
    var width = 1;
    var incwidth= ((100 / distance) * 1000) ;
    var elem = document.getElementById("myBar");
    var x = setInterval(function() {

        distance = distance -1000;

        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("timer").innerHTML =   minutes + ":" + seconds;

        if (width < 100){
            width=width+incwidth;
            elem.style.width = width + "%";
        }


        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "EXPIRED";
            document.getElementById("regForm").submit().click();
        }
    }, 1000);

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

