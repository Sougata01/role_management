<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Multi Auth</title>
    <link rel="stylesheet" href="{{getAssetsUrl('lib/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{getAssetsUrl('css/custom.css')}}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100vh;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-light">    
    @include('layouts.partials.header')
    <div class="container-fluid h-100">
        <div class="row h-100">
            @include('layouts.partials.sidebar')
            <div class="col card border-0 shadow my-5">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{getAssetsUrl('lib/bootstrap/bootstrap.bundle.min.js')}}">
    </script>
</body>

</html>
