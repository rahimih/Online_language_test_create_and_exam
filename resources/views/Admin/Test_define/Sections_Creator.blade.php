@extends('layouts.A_app', ['activePage' => 'Questions', 'titlePage' => __('Question Creator')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <form method="post" enctype="multipart/form-data" action="{{route('QP_Creator.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('POST')

                        <div class="card text-center">
                            <div class="card-header  card-header-primary">
                                <h4 class="card-title ">{{ __('Add Section ') }}</h4>
                                <p class="card-category">{{ __('Section information') }}</p>
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
                                            <button type="button" class="btn btn-link col-2 disabled" aria-disabled="true">Package</button>
                                            <button type="button" class="btn btn-danger col-3">Section</button>
                                            <button type="button" class="btn btn-link col-2 disabled" aria-disabled="true">Part</button>
                                            <button type="button" class="btn btn-link col-2 disabled" aria-disabled="true">Question</button>
                                        </ol>
                                    </nav>

                                    <h5>
                                        <b><i>
                                                {{$maintestname}} / {{$subgroupname}} / {{$skillname}}
                                        </b></i>
                                    </h5>


                                <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ __('PACKAGES NAME') }}</label>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('QUESTIONS_PACKAGES_ID') ? ' has-danger' : '' }}">
                                                <select class="form-control{{ $errors->has('QUESTIONS_PACKAGES_ID ') ? ' is-invalid' : '' }}" name="QUESTIONS_PACKAGES_ID" id="input-QUESTIONS_PACKAGES_ID" value="{{old('QUESTIONS_PACKAGES_ID')}}" type="dropdown" required>
                                                    <option value={{"$pack_id"}}>{{$packname}}</option>
                                                </select>
                                                @if ($errors->has('QUESTIONS_PACKAGES_ID'))
                                                    <span id="QUESTIONS_PACKAGES_ID-error" class="error text-danger" for="input-QUESTIONS_PACKAGES_ID">{{ $errors->first('QUESTIONS_PACKAGES_ID') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ __('PART NAME') }}</label>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('PART_ID') ? ' has-danger' : '' }}">
                                                <select class="form-control{{ $errors->has('PART_ID ') ? ' is-invalid' : '' }}" name="PART_ID" id="input-PART_ID" value="{{old('PART_ID')}}"  type="dropdown" required >
                                                    @foreach($ot_test_parts as $test_parts)
                                                        <option value="{{$test_parts->PART_ID}}">{{$test_parts->PARTS_NAME}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('PART_ID'))
                                                    <span id="PART_ID-error" class="error text-danger" for="input-PART_ID">{{ $errors->first('PART_ID') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ __('QUESTION FROM') }}</label>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('SQUESTION_FROM') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('SQUESTION_FROM') ? ' is-invalid' : '' }}" name="SQUESTION_FROM" id="input-SQUESTION_FROM" type="text" value="{{old('SQUESTION_FROM')}}"  required="true" aria-required="true"/>
                                                @if ($errors->has('SQUESTION_FROM'))
                                                    <span id="SQUESTION_FROM-error" class="error text-danger" for="input-SQUESTION_FROM">{{ $errors->first('SQUESTION_FROM') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ __('QUESTION TO') }}</label>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('SQUESTION_TO') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('SQUESTION_TO') ? ' is-invalid' : '' }}" name="SQUESTION_TO" id="input-SQUESTION_TO" type="text"  value="{{old('SQUESTION_TO')}}" required="true" aria-required="true"/>
                                                @if ($errors->has('SQUESTION_TO'))
                                                    <span id="SQUESTION_TO-error" class="error text-danger" for="input-SQUESTION_TO">{{ $errors->first('SQUESTION_TO') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('PART COUNT') }}</label>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('PART_COUNT') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('PART_COUNT') ? ' is-invalid' : '' }}" name="PART_COUNT" id="input-PART_COUNT" type="text" value="{{old('PART_COUNT')}}" required="false" aria-required="false"/>
                                            @if ($errors->has('PART_COUNT'))
                                                <span id="PART_COUNT-error" class="error text-danger" for="input-PART_COUNT">{{ $errors->first('PART_COUNT') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ __('FILE KIND') }}</label>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('SFILE_KIND') ? ' has-danger' : '' }}">
                                                <select class="form-control{{ $errors->has('SFILE_KIND ') ? ' is-invalid' : '' }}" name="SFILE_KIND" id="input-SFILE_KIND" value="{{old('SFILE_KIND')}}" type="dropdown"  required >
                                                    <option value=N>NONE</option>
                                                    <option value=A>AUDIO</option>
                                                    <option value=V>VIDEO</option>
                                                    <option value=P>PDF</option>
                                                    <option value=I>PICTURE</option>

                                                </select>
                                                @if ($errors->has('SFILE_KIND'))
                                                    <span id="SFILE_KIND-error" class="error text-danger" for="input-SFILE_KIND">{{ $errors->first('SFILE_KIND') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    {{--     input file     --}}

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ __('FILE_NAME') }}</label>
                                        <div class="col-sm-6">
                                            <span class="btn btn-raised btn-round btn-default btn-file">
                                             <span class="fileinput-new">Select file</span>
                                         <input type="file" name="sfile" id="sfile" accept=".MP3,.MP4,.PDF,.JPG,.JPEG"  class="inputfile" />
                                        </span>
                                        </div>
                                    </div>

                            </div>
                            <div class="card-footer ml-md-auto mr-8">
                                <a href="{{route('QP_Creator.index')}}" class="btn btn-info" role="button">Previous</a>
{{--                                <a href="{{route('QP_Creator.store')}}" class="btn btn-info" role="button" type="submit">Next</a>--}}
                                <button type="submit" class="btn btn-info">{{ __('Next') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

