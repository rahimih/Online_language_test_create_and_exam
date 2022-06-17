<!DOCTYPE html>
<html lang="en">
<head>
    <title>END TEST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

</head>
<body>
    @if ($endt_kind==1)
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-center">END TEST</h4>
                    </div>

                    <div class="card-body">
            <div class="card">
            <div class="card-body">
                    <h3 class="card-title text-dark text-left">Dear {{$USER_FN}}  {{$USER_LN}} </h3>
            <div class="card-description text-dark">
            <h4> You success passed the test  <strong> {{$tn}} </strong> </h4>
            <h4>Please refer at the TRF that view of grade </h4>
             <h4> Thanks of you for do it  </h4>
            </div>
        </div>
    </div>
</div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('Dashboard') }}" class="btn btn-primary btn-round">RETURN</a>
                    </div>
    @endif
    @if ($endt_kind==2)
       <div class="row">
         <div class="col-md-8 ml-auto mr-auto">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title text-center">END TEST</h4>
             </div>
              <div class="card-body">
               <div class="card">
               <div class="card-body">
                   <div class="row">
                            <label class="col-sm-3 col-form-label text-dark">{{ __('NAME') }}</label>
                            <div class="col-sm-3">
                                <label class="col-sm-12 col-form-label text-info">  {{ Auth::user()->fname }}  {{ Auth::user()->lname }} </label>
                            </div>
                            <label class="col-sm-3 col-form-label text-dark">{{ __('TEST NAME') }}</label>
                            <div class="col-sm-3">
                            <label class="col-sm-10 col-form-label text-info"> {{$tn}} </label>

                       </div>
                   </div>
                   <div class="row">
                        <label class="col-sm-3 col-form-label text-dark">{{ __('SCORE') }}</label>
                        <div class="col-sm-3">
                            <label class="col-sm-12 col-form-label text-info">  {{$c_ans}} out of {{$max}} </label>
                        </div>
                       <label class="col-sm-3 col-form-label text-dark">{{ __('LEVEL') }}</label>
                       <div class="col-sm-3">
                           <label class="col-sm-12 col-form-label text-info">  {{$level}} </label>
                       </div>
                   </div>
                </div>
            </div>
               <div class="card">
               <div class="card-body">
                <div class="card-body text-center">
                    @if ($level=='A1')
                     <i><img style="width:650px" height="200px"  src="{{ asset('mainpage') }}/images/CEFR/a1.jpg"></i>
                    @endif
                    @if ($level=='A2')
                     <i><img style="width:650px" height="200px" src="{{ asset('mainpage') }}/images/CEFR/a2.jpg"></i>
                    @endif
                    @if ($level=='B1')
                     <i><img style="width:650px" height="200px" src="{{ asset('mainpage') }}/images/CEFR/b1.jpg"></i>
                    @endif
                    @if ($level=='B2')
                     <i><img style="width:650px" height="200px" src="{{ asset('\mainpage') }}/images/CEFR/b2.jpg"></i>
                    @endif
                    @if ($level=='C1')
                      <i><img style="width:650px" height="200px" src="{{ asset('mainpage') }}/images/CEFR/c1.jpg"></i>
                    @endif
                    @if ($level=='C2')
                      <i><img style="width:650px" height="200px" src="{{ asset('mainpage') }}/images/CEFR/c2.jpg"></i>
                    @endif

                </div>
            </div>
              </div>
               <div class="card">
               <div class="card-body">
                    <div class="card-description text-dark">
                     <div class="row">
                         <label class="col-sm-12 col-form-label text-info">  COMMENT: </label>
                     </div>
                       <div class="row">
                        {!!$comment!!}
                    </div>

                 </div>
                </div>
              </div>
             <div class="card-footer text-muted">
                   <a href="{{ route('Dashboard') }}" class="btn btn-primary btn-round">RETURN</a>
               </div>
            </div>
        </div>
       </div>
         </div>
       </div>
    @endif

</div>
</div>

<script>

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


