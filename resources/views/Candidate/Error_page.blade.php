<!DOCTYPE html>
<html lang="en">
<head>
    <title>ERROR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />

</head>
<body>
<div class="row">
<div class="col-md-6 ml-auto mr-auto">
<div class="card">
    <div class="card-header card-header-danger">
        <h4 class="card-title text-center">ERROR</h4>
    </div>
<div class="card-body">
        <div class="card">
        <div class="card-body">
                <h3 class="card-title text-white text-left"> </h3>
            <div class="card-description text-dark">
             <h4>This error can happen because of</h4>
                <h4>-refreshing the test pages</h4>
                <h4>-the connection is lost </h4>
                <h4>-the broswer is not support,please open it with Firefox </h4>
                <h4>please return to dashboard </h4>

            </div>
        </div>
    </div>
</div>

    <div class="card-footer text-muted">
        <a href="{{ route('Dashboard') }}" class="btn btn-danger btn-round center">RETURN</a>
    </div>
</div>
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


