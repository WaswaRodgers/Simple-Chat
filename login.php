<html>
    <head>
            <title>Login page</title>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <script src="js/jquery.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <style>
                .accountError, .accountSuccess{
                    display: none;
                }
            </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-warning navbar-expand-lg">
            <a class="navbar-brand">
                <img src="images/zalego-logo.png" alt="Logo" width="50"> Zalego
            </a>
            <button class="navbar-toggler"
            type="button" data-toggle="collapse"
            data-target="#navbarContent" 
            aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                                Profile
                            </a>
                        </li>
                    </ul>
                </div>
        </nav>
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6 ml-auto mr-auto bg-info rounded">
                    <div class='accountError alert alert-danger' role='alert'></div>
                    <div class='accountSuccess alert alert-success' role='alert'></div>
                    <form action="" method="post" id="loginform">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="emailtext" id="email">
                                    <span class="text-danger emailerror"></span>
                                    <span class="text-danger emailvalid"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" id="password">
                                    <span class="text-danger passworderror"></span>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <input type="hidden" value="1" name="lg">
                                <button name="submit" type="submit" class="btn btn-success">Login</button>
                            </div>
                            <a href="forgotpass.php">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="js/formscript.js"></script>
</html>