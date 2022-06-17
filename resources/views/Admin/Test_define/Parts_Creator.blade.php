@extends('layouts.A_app', ['activePage' => 'Questions', 'titlePage' => __('Question Creator')])
@section('content')
    <div class="content">
        @php
        use App\Http\Controllers\OtPackagesSectionController;
        @endphp
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <form method="post" action="{{route('QP_Creator.step4') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('POST')

                        <div class="card text-center">
                            <div class="card-header  card-header-primary">
                                <h4 class="card-title ">{{ __('Add Part ') }}</h4>
                                <p class="card-category">{{ __('Part information') }}</p>
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
                                        <button type="button" class="btn btn-link col-2 disabled" aria-disabled="true">Section</button>
                                        <button type="button" class="btn btn-danger col-3">part</button>
                                        <button type="button" class="btn btn-link col-2 disabled" aria-disabled="true">Question</button>
                                    </ol>
                                </nav>

{{--                                <h5>
                                    <b><i>
                                            {{$maintestname}} / {{$subgroupname}} / {{$skillname}}
                                    </b></i>
                                </h5>--}}


{{--
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('PACKAGES NAME') }}</label>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('QUESTIONS_PACKAGES_ID') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('QUESTIONS_PACKAGES_ID ') ? ' is-invalid' : '' }}" name="QUESTIONS_PACKAGES_ID" id="input-QUESTIONS_PACKAGES_ID" type="dropdown" required>
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
                                            <select class="form-control{{ $errors->has('PART_ID ') ? ' is-invalid' : '' }}" name="PART_ID" id="input-PART_ID" type="dropdown" placeholder="{{ __('PART NAME') }}"  required >
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
--}}
                                <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ __('QUESTION TYPE') }}</label>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('QUESTION_TYPE_ID') ? ' has-danger' : '' }}">
                                                <select class="form-control{{ $errors->has('QUESTION_TYPE_ID ') ? ' is-invalid' : '' }}" name="QUESTION_TYPE_ID" id="input-QUESTION_TYPE_ID" type="dropdown" value="{{old('QUESTION_TYPE_ID')}}" required  onchange="returnComment()" >
                                                    @foreach($ot_questions_types as $questions_types)
                                                        <option value="{{$questions_types->QUESTION_ID}}">{{$questions_types->QUESTIONS_TYPE}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('QUESTION_TYPE_ID'))
                                                    <span id="QUESTION_TYPE_ID-error" class="error text-danger" for="input-QUESTION_TYPE_ID">{{ $errors->first('QUESTION_TYPE_ID') }}</span>
                                                @endif
                                                <script>
                                                    function returnComment()
                                                    {
                                                        {{--$X = document.getElementById("input-QUESTION_TYPE_ID").value;--}}
                                                        {{--document.getElementById("input-HEADER").innerHTML = !!{{OtPackagesSectionController::question_header($X)}}!!;--}}
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('QUESTION FROM') }}</label>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('PQUESTION_FROM') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('PQUESTION_FROM') ? ' is-invalid' : '' }}" name="PQUESTION_FROM" id="input-PQUESTION_FROM" type="text" value="{{old('PQUESTION_FROM')}}" required="true" aria-required="true"/>
                                            @if ($errors->has('PQUESTION_FROM'))
                                                <span id="PQUESTION_FROM-error" class="error text-danger" for="input-PQUESTION_FROM">{{ $errors->first('PQUESTION_FROM') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('QUESTION TO') }}</label>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('PQUESTION_TO') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('PQUESTION_TO') ? ' is-invalid' : '' }}" name="PQUESTION_TO" id="input-PQUESTION_TO" type="text" value="{{old('PQUESTION_TO')}}" required="true" aria-required="true"/>
                                            @if ($errors->has('PQUESTION_TO'))
                                                <span id="PQUESTION_TO-error" class="error text-danger" for="input-PQUESTION_TO">{{ $errors->first('PQUESTION_TO') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('HEADER') }}</label>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('HEADER') ? ' has-danger' : '' }}">
{{--                                            <input class="form-control{{ $errors->has('HEADER') ? ' is-invalid' : '' }}" name="HEADER" id="input-HEADER" type="text" required="false" aria-required="false"/>--}}
                                            <textarea rows="5" cols="40" class="form-control{{ $errors->has('HEADER') ? ' is-invalid' : '' }}" name="HEADER" id="input-HEADER" type="text" value="{{old('HEADER')}}" required="false" aria-required="false">
                                            </textarea>
                                            @if ($errors->has('HEADER'))
                                                <span id="HEADER-error" class="error text-danger" for="input-HEADER">{{ $errors->first('HEADER') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('FILE KIND') }}</label>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('PFILE_KIND') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('PFILE_KIND ') ? ' is-invalid' : '' }}" name="PFILE_KIND" id="input-PFILE_KIND" value="{{old('PFILE_KIND')}}" type="dropdown"  required >
                                                <option value=N>None</option>
                                                <option value=A>Audio</option>
                                                <option value=V>Video</option>
                                                <option value=P>Pdf</option>
                                                <option value=I>Image</option>
                                            </select>
                                            @if ($errors->has('PFILE_KIND'))
                                                <span id="PFILE_KIND-error" class="error text-danger" for="input-PFILE_KIND">{{ $errors->first('PFILE_KIND') }}</span>
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
                                         <input type="file" name="pfile" id="pfile" accept=".mp3,.mp4,.pdf,.jpg,.jpeg"  class="inputfile" />
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer ml-md-auto mr-8">
                                <a href="{{route('QP_Creator.step2')}}" class="btn btn-info" role="button">Previous</a>
                                <a href="{{route('QP_Creator.step4')}}"  class="btn btn-info" role="button">Next</a>
{{--                                <input type="button"  class="btn btn-info" onClick="history.back()" value="Previous">--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

