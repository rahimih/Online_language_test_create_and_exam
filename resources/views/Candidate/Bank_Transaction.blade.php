<!DOCTYPE html>
<html lang="en">
<head>
    <title>نتیجه تراکنش پرداخت اینترنتی</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

</head>
<body>
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="card text-right">
                    <div class="card-header card-header-primary">
                        <h41 class="card-title text-center">نتیجه پـرداخـت اینتـرنتـی</h41>
                    </div>

           <div class="card-body">
            <div class="card text-right">
            <div class="card-body">
            <div class="card-description text-dark">
            @if ($SaleReferenceId>0)
                <h41> شناسه پرداخت  <strong> {{$SaleReferenceId}} </strong> </h41>
            </br>
             @endif
            <h41>{{$Comment}} </h41>
            </br>
            @if ($SaleReferenceId==0)
             <h41> در صورتی که وجه از حساب شما کسر شده باشد نهایتاً تا ۷۲ ساعت آینده به حساب شما بازگردانده می شود.  </h41>
            @endif
            </div>
        </div>
    </div>

                    <div class="card-footer text-muted">
                       @if ($SaleReferenceId==0)
                         <a href="{{ route('Dashboard') }}" class="btn btn-primary btn-round">RETURN</a>
                       @endif
                      @if ($SaleReferenceId>0)
                         @if($kinds==3)
                          <a href="{{ route('Test_Register.Writing_files') }}" class="btn btn-primary btn-round">Send Files</a>
                         @endif
                         @if($kinds==1)
                          <a href="{{ route('Test_Register.Select_Test') }}" class="btn btn-primary btn-round">Start Test</a>
                         @endif
                      @endif


                    </div>

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


