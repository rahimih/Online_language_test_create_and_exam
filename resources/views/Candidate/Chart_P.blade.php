@extends('layouts.C_app', ['activePage' => 'chart2', 'titlePage' => __('نمودار نمرات کل هر بخش در تصحیح رایتینگ')])
@section('content')
    <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="chart-container" style="position: relative; height:35vh; width:35vw">
                                <canvas id="chart"></canvas>

                                {!! $chart_a->container() !!}

                            </div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                            {!! $chart_a->script() !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="chart-container" style="position: relative; height:35vh; width:35vw">
                                <canvas id="chart"></canvas>

                                {!! $chart_b->container() !!}

                            </div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                            {!! $chart_b->script() !!}

                        </div>
                    </div>
                    <hr>
                </div>

                <div class="row">
                    <hr>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="chart-container" style="position: relative; height:35vh; width:35vw">
                                <canvas id="chart"></canvas>

                                {!! $chart_c->container() !!}

                            </div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                            {!! $chart_c->script() !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="chart-container" style="position: relative; height:35vh; width:35vw">
                                <canvas id="chart"></canvas>

                                {!! $chart_d->container() !!}

                            </div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                            {!! $chart_d->script() !!}

                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection

