<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>LISTENING</title>
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
            <div class="col-md-12">

                <form method="post"  id="regForm" action="{{route('Test_Start.store_l') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('POST')

                    <input name="ID2" id="input-tn" value={{$id2}}  type="text" hidden="true" readonly="true" />
                    <input name="TESTID" id="input-tn" value={{$TEST_ID}}  type="text" hidden="true" readonly="true" />
                    <input name="TESTRID" id="input-tn" value={{$TEST_R_ID}}  type="text" hidden="true" readonly="true" />
                    <input name="tn" id="input-tn" value={{$tn}}  type="text" hidden="true" readonly="true" />
                    <input name="IDT" id="input-IDT" value={{$IDT}}  type="text" hidden="true" readonly="true" />
                    <input name="mt" id="input-mt" value="{{$MT}}"  type="text" hidden="true" readonly="true" />
                    <input name="st" id="input-st" value="{{$ST}}"  type="text" hidden="true" readonly="true" />
                    <input name="tk" id="input-tk" value="{{$Test_kind}}"  type="text" hidden="true" readonly="true" />
                    <input name="ak" id="input-ak" value="{{$Answer_kind}}"  type="text" hidden="true" readonly="true" />


                @foreach($ot_packages_sections as $packages_sections)

                        <div class="tab">
                           <div class="row">
                                  <div class="col-md-6 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="card-body">

                                            <nav aria-label="breadcrumb" role="navigation">
                                                <ol class="breadcrumb">
                                                    <button type="button" class="btn btn-danger col-12">
                                                     <h3 class="w3-white text-center"  style="text-shadow:1px 1px 0 #444" > LISTENING </h3>
                                                     <h2 class="w3-white text-center"  style="text-shadow:1px 1px 0 #444" hidden="true" id=timer{{$i}}>0</h2>
                                                     <h2 class="w3-white text-center"  style="text-shadow:1px 1px 0 #444" hidden="true" id=dur{{$i}}>{{$packages_sections->Listening_duration}}</h2>
                                                    </button>
                                                </ol>
                                            </nav>
                                            <hr>

                                            @if ($packages_sections->FILE_KIND=='A')
                                            <audio controls preload="auto"  id=myaudio{{$i}}  style="margin: 0 auto; display: block; width: 50% ">
                                                <source src= audio/{{$packages_sections->QUESTIONS_PACKAGES_ID}}/{{$packages_sections->FILE_NAME}} >
                                                Your browser does not support the audio element.
                                            </audio>
                                                @endif
                                                @if ($packages_sections->FILE_KIND=='V')
                                                    <video width="520" height="240"  id=myvideo{{$i}}  controls preload="auto" style="margin: 0 auto; display: block" >
                                                        <source src= video/{{$packages_sections->QUESTIONS_PACKAGES_ID}}/{{$packages_sections->FILE_NAME}} >
                                                        Your browser does not support the audio element.
                                                    </video>

                                                @endif
                                            </div>
                                    </div>
                                </div>

                           </div>

                          <div class="card">
                           <div class="card-body">
                            <div class="card">
                                <div class="card-header card-header-info">
                                        <h4> <b> {{$packages_sections->PARTS_NAME}}  /  Questions {{$packages_sections->QUESTION_FROMS}} - {{$packages_sections->QUESTION_TOS}} </b> </h4>
                                </div>
                                <div class="card-body">
                                    @foreach($ot_section_parts as $section_parts)
                                        @if ($packages_sections->OT_PS_ID==$section_parts->OT_PS_ID)
                                    <h4>Questions {{$section_parts->QUESTION_FROMP}} - {{$section_parts->QUESTION_TOP}}</h4>
                                    {!!$section_parts->HEADER!!}
                                            @if ($section_parts->FILE_KINDS=='I')
                                                <img src = "picture/{{$packages_sections->QUESTIONS_PACKAGES_ID}}/{{$section_parts->FILE_NAMES}}"  style="width: 500px ;height="400px";>
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

                    @if ($Answer_kind==2)
                    <div class="tab">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="w3-white text-center" style="text-shadow:1px 1px 0 #444" id="timera"> 0 </h2>
                                <div class="progress-container progress-info">
                                    <span class="progress-badge"></span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-info" id="myBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                        <img src="material/img/logo_m.jpg" >
                                        </div>
                                        <div class="row">
                                            <table border="2" cellpadding="2" cellspacing="2" style="height:62px; width:1100px">
                                                <tbody>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <h4 style="text-align:center">{{ ('Listening and Reading Answer Sheet') }}</h4>
                                        <hr />

                                        <div class="row">
                                            <h5>{{ __('Centre number:') }}</h5>
                                        </div>

                                        <div class="row">
                                            <h5>{{ __('Full Name:') }}</h5>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <h5>  {{ Auth::user()->fname }}  {{ Auth::user()->lname }} </h5>
                                        </div>

                                        <div class="row">
                                            <h5>{{ __('Test Date:') }}</h5>&nbsp;&nbsp;&nbsp;&nbsp;
                                             <h5>  {{$c_date}}  </h5>
                                        </div>

                                        <div class="row">
                                            <h5>{{ __('Day') }}</h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @for($i=1;$i<=31;$i++)
                                                <label for="d{{$i}}">{{$i}}</label> &nbsp;&nbsp;
                                            @endfor
                                        </div>

                                        <div class="row">
                                            <h5>{{ __('Month') }}</h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @for($i=1;$i<=12;$i++)
                                                <label for="m{{$i}}">{{$i}}</label> &nbsp;&nbsp;
                                            @endfor

                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <h5>{{ __('Year') }}</h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @for($i=20;$i<=30;$i++)
                                                <label for="y{{$i}}">{{$i}}</label> &nbsp;&nbsp;
                                            @endfor
                                        </div>

                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title text-center"> Listening  </h4>
                                    </div>
                                    <div class="card-body">
                                        <table align="left" border="2" cellpadding="2" cellspacing="2" style="width:1100px">
                                            <tbody>
                                            @for($j=$min;$j<=$max/2;$j++)
                                                <tr>
                                                    <td style="text-align:center">
                                                        <h5>{{$j}}</h5>
                                                    </td>
                                                    <td>
                                                        <div class="col-12 text-right">
                                                            <input type="text" name=QLA{{$j}}  value="" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td style="text-align:center">
                                                        &#10003; {{$j}}  X
                                                    </td>
                                                    <td style="text-align:center">
                                                        <h5>{{$j+20}}</h5>

                                                    </td>
                                                    <td>
                                                        <div class="col-12 text-right">
                                                            <input type="text" name=QLA{{$j+20}}  value="" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td style="text-align:center">
                                                        &#10003; {{$j+20}}  X
                                                    </td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
                    @endif

                    <div class="card-footer ml-auto mr-auto float-right overflow-auto">
                        <button type="button" class="btn btn-info btn-round" id="prevBtn" hidden="true" onclick="nextPrev(-1)" >{{ __('Previous') }}</button>
                        <button type="button" class="btn btn-info btn-round" id="nextBtn" hidden="true" onclick="nextPrev(1)">{{ __('next') }}</button>
                    </div>


                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        @if ($Answer_kind==2)
                        <span class="step"></span>
                        @endif
                    </div>

             </form>
            </div>
        </div>
    </div>
</div>

<script>
    var dur=0,distance;
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
            document.getElementById("nextBtn").style.display = "inline";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        if (n == 0) {
            var aid = document.getElementById("myaudio" + (currentTab + 1));
            var vid = document.getElementById("myvideo" + (currentTab + 1));
            var des = document.getElementById("timer" + (currentTab + 1));
            var dur = document.getElementById("dur" + (currentTab + 1)).textContent;

            if (aid) {
                 // dur= aid.duration;
                timer(dur,des);
                aid.autoplay = true;
                aid.controls= false;
                aid.load();
            }
            if (vid) {
                // dur=vid.duration;
                timer(dur,des);
                vid.autoplay = true;
                vid.load();
            }
        }
            if (n > 0 && n <= (x.length - 1)) {
                var aid1 = document.getElementById("myaudio" + (currentTab));
                var vid1 = document.getElementById("myvideo" + (currentTab));
                var aid = document.getElementById("myaudio" + (currentTab + 1));
                var vid = document.getElementById("myvideo" + (currentTab + 1));
                var des = document.getElementById("timer" + (currentTab + 1));
                var dur = document.getElementById("dur" + (currentTab + 1)).textContent;

                if (aid) {
                    // dur = aid.duration;
                    timer(dur, des);
                    aid1.pause();
                    aid.autoplay = true;
                    aid.controls= false;
                    aid.load();
                }
                if (vid) {
                    // dur = vid.duration;
                    timer(dur, des);
                    vid1.pause();
                    vid.autoplay = true;
                    vid.load();
                }
            }

            if (n == 4) {
                var des = document.getElementById("timera");
                dur = 600;
                timer(dur, des);
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

    function timer(dura,desa) {
        // timer
        distance = dura * 1000;
        var width = 1;
        var incwidth = ((100 / distance) * 1000);
        var elem = document.getElementById("myBar");
        var x = setInterval(function () {

            distance = distance - 1000;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

             desa.innerHTML = minutes + ":" + seconds;


            if (width < 100) {
                width = width + incwidth;
                elem.style.width = width + "%";
            }


            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                desa.innerHTML = "EXPIRED";
                 document.getElementById("nextBtn").click();
            }
        }, 1000);
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
