<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>



    <meta name="author" content="" />
    <title>Dashboard - HMS</title>

    <!-- include links here -->
    @section('links')
    @show
</head>

<body class="sbnav-fixed">

    <!-- include header_nav here -->
    @section('header_nav')
    @show
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- include sidebar here -->
            @section('sidebar')
            @show
        </div>
        <div id="layoutSidenav_content">

            <!-- include body here -->
            @section('body')

            @show

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- include scripts here -->
    @section('scripts')
    @show
</body>

</html>