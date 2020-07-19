
<?php
    include('functions.php');
    session_start();
    if ($_SESSION['Email'] && $_SESSION['Pass']) {
        $mail = $_SESSION["Email"];
        $result = mysqli_query($dbc,"SELECT id, firstname, email, phonenumber, avatar, created_at FROM users WHERE email='$mail'");
        $row = mysqli_fetch_assoc($result);

        if(!empty($_POST["logout"])) {
            $_SESSION["Email"] = "";
            $_SESSION["Pass"] = "";
            session_destroy();
            header('location: login.php');
        }
    }else {
        header('location: login.php');
    }
?>
<html>
    <head>
            <title>Profile page</title>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/animate/animate.min.css">
            <link rel="stylesheet" href="css/style.css">
            <script src="js/jquery.js"></script>
            <script src="css/bootstrap4/js/popper.min.js"></script>
            <script src="css/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-success navbar-expand-lg">
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
                            <a class="nav-link" href="myindex.html">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="profile.php" method="post">
                                <button type="submit" value="logout" name="logout" class="nav-link btn btn-danger">LogOut</button>
                            </form>
                        </li>
                    </ul>
                </div>
        </nav>
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-4 offset-4 rounded-circle">
                    <img src="images/<?php echo($row['avatar']);?>" class="rounded-circle" width="100%">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 bg-warning text-dark">
                    <form method="post" enctype="multipart/form-data" action="update.php">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">First name</label>
                                    <input class="form-control" type="text" value="<?php echo($row['firstname']);?>" name="firstnametext" id="firstname">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email"  value="<?php echo($row['email']);?>" name="emailtext" id="email">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input class="form-control" type="text"  value="<?php echo($row['phonenumber']);?>"  name="phone" id="phone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="avatar">Profile photo</label>
                                    <input class="form-control" type="file" name="avatar" id="avatar">
                                    <input class="form-control" type="hidden"  value="<?php echo($row['avatar']);?>"  name="oldavatar" id="phone">
                                    <input class="form-control" type="hidden"  value="<?php echo($row['id']);?>"  name="userid" id="userid">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <div class="rounded col-md-6 mr-auto ml-auto">
                    <form action="" method="post" id="sendmessage">
                        <div class="row mt-3 mb-2">
                            <div class="col-md-12">
                                <div class="chat"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input id="myId" type="hidden" name="senderId" value="<?php echo($row['id']);?>">
                                <input autocomplete="off" id="textmessage" name="message" type="text" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="css/bootstrap4/js/formscript.js"></script>
</html>