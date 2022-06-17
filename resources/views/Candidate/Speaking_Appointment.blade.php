<!DOCTYPE html>
<html lang="en">
<head>
    <title>Speaking Test Appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <link href="fullcalendar/main.css" rel="stylesheet"/>
    <script src="fullcalendar/main.js"></script>

</head>

<body style="background-color:white;">
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">

                    <form method="post"  id="regForm" action="{{route('Speaking.TimeAppointment') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('POST')

                            <div class="row">
                                <div class="card ">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title">{{ __('Speaking Test Appointment ') }}</h4>
                                        <p class="card-category">{{ __('Select Date') }}</p>
                                    </div>
                                    <div class="card-body ">
                                        <nav aria-label="breadcrumb" role="navigation">
                                            <ol class="breadcrumb">
                                                <button type="button" id="button1" class="btn btn-link col-2 disabled" aria-disabled="true">Information</button>
                                                <button type="button" id="button2" class="btn btn-danger col-3">Select Date</button>
                                                <button type="button" id="button3" class="btn btn-link col-3 disabled" aria-disabled="true">Select Time</button>
                                            </ol>
                                        </nav>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id='calendar'></div>
                                            </div>
                                        </div>

                                </div>
                                </div>
                            </div>

                                    <input name="test_r_id" id="input-test_id" value="{{$TEST_R_ID}}" type="text" hidden="true" readonly="true"/>
                                    <input name="test_id" id="input-test_id" value="{{$TEST_ID}}"  type="text" hidden="true" readonly="true"/>
                                    <input name="c_date" id="c_date" type="text" hidden="true" readonly="true"/>

                    <div class="card-footer ml-auto mr-auto float-right overflow-auto">
                            <button type="submit" class="btn btn-info btn-round" id="nxtBtn" >{{ __('Next') }}</button>
                            </div>

                    </form>

                  </div>
                </div>
            </div>
        </div>

<!--=================================-->
</body>


<script>
    var s = new Date();
    var element;
    var value;
    var c_date;
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            navLinks: false,
            dragScroll: false,
            dragSelection : false,
            validRange: {
                start: s
            },
            dateClick: function(info) {
                c_date= info.dateStr;
                document.getElementById('c_date').value = c_date;
            }
        });
        calendar.render();
    });


</script>

</html>

