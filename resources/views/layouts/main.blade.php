<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Multi Auth</title>
    <link rel="stylesheet" href="{{ getAssetsUrl('lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ getAssetsUrl('css/custom.css') }}">
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
</head>

<body class="bg-light">
    @include('layouts.partials.header')
    <div class="container-fluid h-100">
        <div class="row justify-content-end h-100">
            <div class="col-5 col-sm-3 col-lg-2 bg-dark fixed-top h-100 mt-5 z-100">
                @include('layouts.partials.sidebar')
            </div>
            <div class="col-7 col-sm-9 col-lg-10 card border-0 shadow" style="margin-top: 100px">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- javascript files --}}
    <script>
        function confirmation(e) {
            e.preventDefault();
            // grab the form
            var form = e.target;
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#0B5ED7",
                cancelButtonColor: "#BB2D3B",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // submit the form
                    form.submit()
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ getAssetsUrl('lib/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
