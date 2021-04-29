<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="../files/css/login.css" rel="stylesheet" />

<!------ Include the above in your HEAD tag ---------->

<!--author:starttemplate-->
<!--reference site : starttemplate.com-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="unique login form,leamug login form,boostrap login form,responsive login form,free css html login form,download login form">
    <meta name="author" content="leamug">
    <title>HMS</title>
    <link href="css/style.css" rel="stylesheet" id="style">
    <!-- Bootstrap core Library -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <!-- Font Awesome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 text-center">
                <h1 class='text-white'>Hospital Management System</h1>
                <div class="form-login"></br>
                    <form method="post" action="{{url('check_login')}}">@csrf
                        <h4>Secure Login</h4>
                        </br>

                        <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" name="username" required />
                        </br></br>
                        <input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="password" name="password" required />
                        </br></br>
                        <div class="wrapper">
                            <span class="group-btn">
                                <button type="submit" class="btn btn-danger btn-md">login <i class="fa fa-sign-in"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </br></br></br>
        <!--footer-->
        <div class="footer text-white text-center">

        </div>
        <!--//footer-->
    </div>
</body>

</html>