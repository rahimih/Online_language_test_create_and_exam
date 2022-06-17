{{--@extends('layouts.E_app', ['activePage' => 'Writing users', 'titlePage' => __('Writing_Users_list')])--}}
{{--@section('content')--}}
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
                <div class="col-md-8">
                    <form method="post" enctype="multipart/form-data" action="{{route('WRITING_SERVICES.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('POST')

                        <div class="tab">
                        <div class="row">
                        <div class="card ">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">{{ __('Grade and comment of Writing ') }}</h4>
                                <p class="card-category">{{ __('Writing information') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ol class="breadcrumb">
                                            <button type="button" id="button1" class="btn btn-danger col-3">Overall Comment</button>
                                            <button type="button" id="button2" class="btn btn-link col-3 disabled" aria-disabled="true">grade / comment</button>
                                            <button type="button" id="button3" class="btn btn-link col-3 disabled" aria-disabled="true">files</button>
                                        </ol>
                                    </nav>
                                    <hr>

                             @foreach($ot_user as $user)

                                <div class="row">
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('Candidate Name') }}</label>
                                        <div class="col-sm-8">
                                            <label class="col-sm-12 col-form-label text-info">  {{$user['fname']}}  {{$user['lname']}} </label>
                                        </div>
                                    </div>
                                <div class="row">
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('Age') }}</label>
                                        <div class="col-sm-8">
                                            <label class="col-sm-12 col-form-label text-info"> {{ $user['age']}} </label>
                                        </div>
                                    </div>
                                <div class="row">
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('Candidate Number') }}</label>
                                        <div class="col-sm-8">
                                            <label class="col-sm-12 col-form-label text-info"> 000{{$user['id']}} </label>
                                        </div>
                                    </div>
                                <hr>
                            </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label-f text-dark">{{ __('Overall Comment') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('O_Comment') ? ' has-danger' : '' }}">
                                            <textarea rows="1" cols="200" dir="ltr"  spellcheck="true" data-gramm="true" style="left: auto" class="form-control" name="O_Comment" id="input-O_Comment" type="text" required="false" aria-required="false"></textarea>
                                            @if ($errors->has('O_Comment'))
                                                <span id="O_Comment-error" class="error text-danger" for="input-O_Comment">{{ $errors->first('O_Comment') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                <hr>
                        </div>
                        </div>
                        </div>

                        <div class="tab">
                            <div class="row">
                                <div class="card ">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title">{{ __('Grade and comment of Writing ') }}</h4>
                                        <p class="card-category">{{ __('Writing information') }}</p>
                                    </div>
                                    <div class="card-body ">
                                        <nav aria-label="breadcrumb" role="navigation">
                                            <ol class="breadcrumb">
                                                <button type="button" id="button1" class="btn btn-link col-3 disabled" aria-disabled="true">Overall Comment</button>
                                                <button type="button" id="button2" class="btn btn-danger col-3" >grade / comment</button>
                                                <button type="button" id="button3" class="btn btn-link col-3 disabled" aria-disabled="true">files</button>
                                            </ol>
                                        </nav>
                                        <hr>
                                     @foreach($ot_skill_level_relations as $skill_level_relations)
                                    <div class="row">
                                            <label class="col-sm-5 col-form-label-f text-dark">{{$skill_level_relations['abs_name']}} / {{$skill_level_relations['level_name']}}</label>
                                            <input name=slr_id{{$i}} id=input-slr_id{{$i}} value="{{$skill_level_relations['skill_level_relation_id']}}"  type="text" hidden="true" readonly="true" />
                                    </div>
                                    <hr>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label-f text-dark">{{ __('Grade') }}</label>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <input class="form-control" name=grade{{$i}} id=input-grade{{$i}} type="number" step="0.5" required="true" aria-required="true"/>
{{--                                                    @if ($errors->has(grade{{$i}}))--}}
{{--                                                        <span id="grade{{$i}}-error" class="error text-danger" for="input-grade{{$i}}">{{ $errors->first(grade{{$i}}) }}</span>--}}
{{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label-f text-dark">{{ __('Comment') }}</label>
                                            <div class="col-sm-5">
                                            <div class="form-group">
                                                <textarea rows="1" cols="200" dir="ltr"  spellcheck="true" data-gramm="true" style="left: auto" class="form-control" name=Comment{{$i}} id=input-Comment{{$i}} type="text" required="false" aria-required="false"></textarea>
{{--                                                @if ($errors->has('Comment{{$i}}'))--}}
{{--                                                    <span id="Comment{{$i}}-error" class="error text-danger" for="input-Comment{{$i}}">{{ $errors->first('Comment{{$i}}') }}</span>--}}
{{--                                                @endif--}}
                                            </div>
                                        </div>
                                        </div>
                                    <hr>

                                    @php
                                    $i=$i+1;
                                    @endphp

                                @endforeach
                                     <hr>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab">
                            <div class="row">
                                <div class="card ">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title">{{ __('Grade and comment of Writing ') }}</h4>
                                        <p class="card-category">{{ __('Writing information') }}</p>
                                    </div>
                                    <div class="card-body ">
                                        <nav aria-label="breadcrumb" role="navigation">
                                            <ol class="breadcrumb">
                                                <button type="button" id="button1" class="btn btn-link col-3 disabled" aria-disabled="true">Overall Comment</button>
                                                <button type="button" id="button2" class="btn btn-link col-3 disabled" aria-disabled="true">grade / comment</button>
                                                <button type="button" id="button3" class="btn btn-danger col-3">files</button>
                                            </ol>
                                        </nav>
                                        <hr>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('Orginal File Name') }}</label>
                                        <label class="col-sm-4 col-form-label text-info">{{$filename}}</label>
                                        <input name="wid" id="input-wid" value="{{$id}}"  type="text" hidden="true" readonly="true" />
                                        <input name="wi" id="input-wi" value="{{$i}}"  type="text" hidden="true" readonly="true" />
                                    </div>
                                <hr>
                                <div class="row">
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('Correcting Writing') }}</label>
                                        <div class="col-sm-6">
                                            <span class="btn btn-raised btn-round btn-default btn-file">
                                             <span class="fileinput-new">Select file</span>
                                             <input type="file" name="wfile" id="wfile" accept=".docx,.doc,.pdf"  class="inputfile" />
                                        </span>
                                        </div>
                                    </div>
                                <hr>
                                    </div>
                                </div>
                            </div>
                        </div>


{{--
                            <div class="card-footer ml-auto mr-auto left ">
                                <button type="submit" class="btn btn-info">{{ __('ثبت نهایی') }}</button>
                            </div>
--}}
                            <div class="card-footer ml-auto mr-auto float-right overflow-auto">
                            <button type="button" class="btn btn-info btn-round" id="prevBtn" onclick="nextPrev(-1)" >{{ __('Previous') }}</button>
                            <button type="button" class="btn btn-info btn-round" id="nextBtn" onclick="nextPrev(1)">{{ __('Next') }}</button>
                        </div>

                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
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
                document.getElementById("nextBtn").innerHTML = "next";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
                document.getElementById("nextBtn").innerHTML = "next";
            }
            if (n == 1) {
                document.getElementById("nextBtn").innerHTML = "next";
            }
            if (n == 2) {
                document.getElementById("nextBtn").innerHTML = "submit";
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
{{--@endsection--}}
