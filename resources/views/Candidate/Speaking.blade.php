<!DOCTYPE html>
<html lang="en">
<head>
    <title>SPEAKING</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
           <div class="col-md-10 ml-auto mr-auto">
            <div class="card">
             <div class="card-body">

                <form method="post"  id="regForm" action="{{route('Test_Start.store_s') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('POST')

                    <input name="ID2" id="input-tn" value={{$id2}}  type="text" hidden="true" readonly="true" />
                    <input name="TESTID" id="input-tn" value={{$TEST_ID}}  type="text" hidden="true" readonly="true" />
                    <input name="TESTRID" id="input-tn" value={{$TEST_R_ID}}  type="text" hidden="true" readonly="true" />
                    <input name="tn" id="input-tn" value={{$tn}}  type="text" hidden="true" readonly="true" />
                    <input name="IDT" id="input-IDT" value={{$IDT}}  type="text" hidden="true" readonly="true" />
                    <input name="mt" id="input-mt" value="{{$MT}}"  type="text" hidden="true" readonly="true" />
                    <input name="st" id="input-st" value="{{$ST}}"  type="text" hidden="true" readonly="true" />

                    @foreach($ot_packages_sections as $packages_sections)
                      @foreach($ot_section_parts as $section_parts)
                        @if ($packages_sections->OT_PS_ID==$section_parts->OT_PS_ID)
                      <div class="tab">
                          <div class="row">
                              <div class="col-md-6 ml-auto mr-auto">
                                  <div class="card">
                                      <div class="card-body">
                                          <nav aria-label="breadcrumb" role="navigation">
                                              <ol class="breadcrumb">
                                                  <button type="button" class="btn btn-info col-12">
                                                      <h2 class="w3-white text-center" style="text-shadow:1px 1px 0 #444" id=timer{{$i}}>0</h2>
                                                      <h2 class="w3-white text-center" style="text-shadow:1px 1px 0 #444" hidden="true" id=delay_dur{{$i}}>{{$packages_sections->speaking_delay}}</h2>
                                                      <h2 class="w3-white text-center" style="text-shadow:1px 1px 0 #444" hidden="true" id=speaking_dur{{$i}}>{{$packages_sections->speaking_duration}}</h2>
                                                      <div class="progress-container progress-bar-danger">
                                                          <span class="progress-badge"></span>
                                                          <div class="progress">
                                                              <div class="progress-bar progress-bar-striped progress-bar-danger" id=myBar{{$i}} role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
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

                          <div class="card ">
                                  <div class="card-header card-header-info">
                                      <h4 class="card-title">{{$packages_sections->PARTS_NAME}}  Questions {{$packages_sections->QUESTION_FROMS}} - {{$packages_sections->QUESTION_TOS}}</h4>
                                      <p class="card-category">Questions {{$section_parts->QUESTION_FROMP}} - {{$section_parts->QUESTION_TOP}}</p>
                                  </div>
                                  <div class="card-body ">
                                    <div class = "text-black text-center ">
                                            <h4>Speak your answer to the question below</h4>
                                        <hr>
                                            {!!$section_parts->HEADER!!}
                                                {!!$section_parts->HTML_QUESTIONS!!}
                                    </div>
                                      @if($j==2)
                                          <div class = "text-black text-left ">
                                              <h4>Write my NOTE if you need in this below box</h4>
                                              <hr>
                                          </div>
                                      <div class="card ">
                                          <div class="col-sm-12">
                                              <div class="form-group">
                                                  <textarea rows="10" cols="400" dir="ltr"  style="left: auto" class="form-control" name=Note id=input-note type="text" required="false" aria-required="false"></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      @endif

                                      <div class="card ">
                                            <div id="controls">
                                                <hr>
                                                <button type="button" onclick="startRecording"  class="btn btn-primary btn-round" id=recordButton{{$i}} >Record</button>
                                                <button type="button" onclick="pauseRecording" class="btn btn-primary btn-round" hidden="true" id=pauseButton{{$i}} >Pause</button>
                                                <button type="button" onclick="stopRecording"  class="btn btn-primary btn-round" id=stopButton{{$i}}>Stop</button>
                                            </div>
                                          <hr>
                                            <div id=formats{{$i}}></div>
                                            <p><strong>Recordings:</strong></p>
                                            <ol id=recordingsList{{$i}}></ol>
                                      </div>

                                </div>
                            </div>

                          @php
                              $i=$i+1
                          @endphp

                      </div>
                    @endif
                    @endforeach
                    @endforeach

                    <div class="card-footer ml-auto mr-auto float-right overflow-auto">
                        <button type="button" class="btn btn-info btn-round" id="prevBtn" hidden="true" disabled="true" onclick="nextPrev(-1)" >{{ __('Previous') }}</button>
                        <button type="button" class="btn btn-info btn-round" id="nextBtn" disabled="true" onclick="nextPrev(1)">{{ __('next') }}</button>
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
    </div>
</div>


<script>

    var gumStream;
    var rec;
    var input;
    var AudioContext = window.AudioContext || window.webkitAudioContext;
    var audioContext;

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
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        des = document.getElementById("timer" + (currentTab + 1));
        d_dur = document.getElementById("delay_dur" + (currentTab + 1)).textContent;
        s_dur = document.getElementById("speaking_dur" + (currentTab + 1)).textContent;
        elem = document.getElementById("myBar"+ (currentTab + 1));
        recordButton = document.getElementById("recordButton" + (currentTab + 1));
        stopButton = document.getElementById("stopButton" + (currentTab + 1));
        pauseButton = document.getElementById("pauseButton" + (currentTab + 1));
        formats = document.getElementById("formats" + (currentTab + 1));
        recordingsLists = document.getElementById("recordingsList" + (currentTab + 1));
        recordButton.addEventListener("click", startRecording);
        stopButton.addEventListener("click", stopRecording);
        pauseButton.addEventListener("click", pauseRecording);
        stopButton.disabled=true;

        // timer1(d_dur,des,elem);
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
        document.getElementById("nextBtn").disabled=true;
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

    function timer1(dura,desa,elema) {
        // timer
        var distance = dura * 1000;
        var width = 1;
        var incwidth = ((100 / distance) * 1000);
        var x = setInterval(function () {

            distance = distance - 1000;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            desa.innerHTML = minutes + ":" + seconds;

            if (width < 100) {
                width = width + incwidth;
                elema.style.width = width + "%";
            }


            // If the count down is over, write some text
            if (distance <= 0) {
                clearInterval(x);
                // desa.innerHTML = "EXPIRED";
                des = document.getElementById("timer" + (currentTab + 1));
                s_dur = document.getElementById("speaking_dur" + (currentTab + 1)).textContent;
                elem = document.getElementById("myBar"+ (currentTab + 1));
                timer2(s_dur,des,elem);
            }
        }, 1000);
    }
    function timer2(dura,desa,elema) {
        // timer
        var distance = dura * 1000;
        var width = 1;
        var incwidth = ((100 / distance) * 1000);
        var x = setInterval(function () {

            distance = distance - 1000;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            desa.innerHTML = minutes + ":" + seconds;

            if (width < 100) {
                width = width + incwidth;
                elema.style.width = width + "%";
            }

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                desa.innerHTML = 0;
                if (document.getElementById("nextBtn").disabled==true)
                {
                     stopRecording();
                    // document.getElementById("nextBtn").click();
                }
                else
                {
                    document.getElementById("nextBtn").click();
                }

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

    //----------
    function startRecording() {
        stopButton.disabled=false;
        recordButton.disabled= true;
        timer2(s_dur,des,elem);

        var constraints = { audio: true, video:false }
        navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
            audioContext = new AudioContext();
            formats.innerHTML="Format: 1 channel pcm @ "+audioContext.sampleRate/1000+"kHz"
            gumStream = stream;
            input = audioContext.createMediaStreamSource(stream);
            rec = new Recorder(input,{numChannels:1})
            rec.record()

        }).catch(function(err) {
        });
    }
    function pauseRecording(){
        if (rec.recording){
            //pause
            rec.stop();
            pauseButton.innerHTML="Resume";
        }else{
            //resume
            rec.record()
            pauseButton.innerHTML="Pause";

        }
    }
    function stopRecording() {
        recordButton.disabled=false;
        stopButton.disabled=true;
        document.getElementById("nextBtn").disabled=false;
        rec.stop();
        gumStream.getAudioTracks()[0].stop();
        rec.exportWAV(createDownloadLink);
    }
    function createDownloadLink(blob) {

        var url = URL.createObjectURL(blob);
        var au = document.createElement('audio');
        var li = document.createElement('li');

        var filename = new Date().toISOString();
        au.controls = true;
        au.src = url;
        li.appendChild(au);
        recordingsLists.appendChild(li);
    }

</script>
<!--=================================-->
<script src="js/recorder.js"></script>

</body>
</html>
