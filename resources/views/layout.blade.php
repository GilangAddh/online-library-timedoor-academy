<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('style/style.css') }}>
</head>

<body>
    <header>
        <nav class="navbar bg-grey py-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src={{ asset('images/timedoor-logo.png') }} alt="Logo" width="90"
                        class="d-inline-block align-text-top me-3">
                    Online Library
                </a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-grey w-100 py-3">
        <div class="text-center ">
            <span class="text-muted fs-5">Timedoor Online Library</span>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/3cfd8eaa87.js" crossorigin="anonymous"></script>
    <script src="{{ asset('script/script.js') }}"></script>

</body>

</html>
