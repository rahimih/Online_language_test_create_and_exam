@extends('layouts.I_app', ['activePage' => 'chart1', 'titlePage' => __('نمودارنمرات کل در تصحیح رایتینگ')])
@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-8">
                    <div class="row">
                      <div class="chart-container" style="position: relative; height:35vh; width:35vw">
                       <canvas id="chart"></canvas>

                       {!! $chart->container() !!}

                       </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                        {!! $chart->script() !!}

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-8">
                    <div class="row">
                            <div class="chart-container" style="position: relative; height:35vh; width:35vw">
                                <canvas id="chart"></canvas>

                                {!! $chart2->container() !!}

                            </div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                            {!! $chart2->script() !!}

                        </div>
                </div>
                </div>

            </div>
        </div>
@endsection

