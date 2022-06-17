@extends('layouts.A_app', ['activePage' => 'Questions', 'titlePage' => __('Question Creator')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
{{--                    <form method="post" action="{{route('Q_Creator.index') }}" autocomplete="off" class="form-horizontal">--}}
{{--                        @csrf--}}
{{--                        @method('POST')--}}

                        <div class="card text-center">
                            <div class="card-header  card-header-primary">
                                <h4 class="card-title ">{{ __('Update Question Packages ') }}</h4>
                                <p class="card-category">{{ __('Question Packages information') }}</p>
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
                                            <a href="{{ route('Q_Package.index') }}" class="btn btn-link col-3 disabled" aria-disabled="true">BACK TO LIST1</a>
                                            <a href="{{ route('Q_Package.index') }}" class="btn btn-danger col-5">BACK TO LIST2</a>
                                            <a href="{{ route('Q_Package.index') }}" class="btn btn-link col-3 disabled" aria-disabled="true">BACK TO LIST3</a>
                                        </ol>
                                    </nav>


                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('PACKAGES NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('QUESTIONS_PACKAGES_NAME') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('QUESTIONS_PACKAGES_NAME') ? ' is-invalid' : '' }}" name="QUESTIONS_PACKAGES_NAME" id="input-QUESTIONS_PACKAGES_NAME" type="text" required="false" aria-required="false"/>
                                            @if ($errors->has('QUESTIONS_PACKAGES_NAME'))
                                                <span id="QUESTIONS_PACKAGES_NAME-error" class="error text-danger" for="input-QUESTIONS_PACKAGES_NAME">{{ $errors->first('QUESTIONS_PACKAGES_NAME') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('QUESTIONS COUNT') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('QUESTIONS_COUNT') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('QUESTIONS_COUNT') ? ' is-invalid' : '' }}" name="QUESTIONS_COUNT" id="input-QUESTIONS_COUNT" type="text" required="false" aria-required="false"/>
                                            @if ($errors->has('QUESTIONS_COUNT'))
                                                <span id="QUESTIONS_COUNT-error" class="error text-danger" for="input-QUESTIONS_COUNT">{{ $errors->first('QUESTIONS_COUNT') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('TIME PERIOD (minutes)') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('TOTAL_TEST_TIME') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('TOTAL_TEST_TIME') ? ' is-invalid' : '' }}" name="TOTAL_TEST_TIME" id="input-TOTAL_TEST_TIME" type="text" required="false" aria-required="false"/>
                                            @if ($errors->has('TOTAL_TEST_TIME'))
                                                <span id="TOTAL_TEST_TIME-error" class="error text-danger" for="input-TOTAL_TEST_TIME">{{ $errors->first('TOTAL_TEST_TIME') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer ml-md-auto mr-8">
                                <a href="/Questions_Create" class="btn btn-info" role="button">previous</a>
                                <a href="/Questions_Create2" class="btn btn-info" role="button">Next</a>
                            </div>
                        </div>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
