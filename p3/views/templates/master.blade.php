<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title', $app->config('app.name'))</title>
    <meta charset='utf-8'>
    <link href='/css/app.css' rel='stylesheet'>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='shortcut icon' href='/favicon.ico'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
    @yield('head')
</head>

<body>

    <header id="header-override">
        <!-- Fixed navbar -->
        <nav class=" navbar navbar-expand-md fixed-top" id="navbar-override">
            <a class="navbar-brand" href="#">
                <img src='/images/tm-logo.png' width="200" class="d-inline-block align-top" alt="">
            </a>
            <button id="button-override" class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">

        <h1 class="mt-5">@yield('page-title')</h1>

        <p>@yield('page-intro')</p>

        @yield('page-content')

    </main>

    <footer class="footer">
        <div class="container">
            <p>
                For educational purposes only, produced in fullfillment of Harvard Extension School DGMD E-2 Section 1
                Web Programming for Beginners with PHP.
            </p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
</body>

</html>