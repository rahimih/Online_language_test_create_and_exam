@extends('layouts.E_app', ['activePage' => 'Writing users', 'titlePage' => __('Writing_Users_list')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <form method="post" enctype="multipart/form-data" action="{{route('WRITING_SERVICES.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('POST')

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
                                                    <input class="form-control" name=grade{{$i}} id=input-grade{{$i}}  type="number" step="0.5" min="0" max="9" required="true" aria-required="true"/>
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label-f text-dark">{{ __('Comment') }}</label>
                                            <div class="col-sm-5">
                                            <div class="form-group">
                                                <textarea rows="1" cols="200" dir="ltr"  spellcheck="true" data-gramm="true" style="left: auto" class="form-control" name=Comment{{$i}} id=input-Comment{{$i}} type="text" required="false" aria-required="false"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    <hr>

                                    @php
                                    $i=$i+1;
                                    @endphp

                                @endforeach
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
                                             <input type="file" name="wfile" id="wfile"  required="true" aria-required="true" accept=".docx,.doc,.pdf"  class="inputfile" />
                                        </span>
                                        </div>
                                    </div>
                                <hr>

                              </div>
                            <div class="card-footer ml-auto mr-auto left ">
                                <button type="submit" class="btn btn-info">{{ __('ثبت نهایی') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
