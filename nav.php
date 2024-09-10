<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navbar</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
     /* General Body Styles */
     body {
        background: linear-gradient(135deg, #000000 0%, #e63946 100%);
        color: #fff;
        font-family: 'Open Sans', sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Navbar Styles */
    .navbar {
        background: rgba(0, 0, 0, 0.8);
        border: none;
    }

    .navbar-inverse .navbar-brand {
        color: #fff;
    }

    .navbar-inverse .navbar-brand img {
        height: 50px;
    }

    .navbar-inverse .navbar-nav > li > a {
        color: #fff;
        transition: color 0.3s;
    }

    .navbar-inverse .navbar-nav > li > a:hover,
    .navbar-inverse .navbar-nav > li.active > a {
        color: #e63946; /* Red text color on hover */
    }

    .navbar-toggle .icon-bar {
        background-color: #fff;
    }

    .navbar-collapse {
        background: rgba(0, 0, 0, 0.8);
    }

    .navbar-collapse .navbar-nav > li > a {
        color: #fff;
        transition: color 0.3s;
    }

    .navbar-collapse .navbar-nav > li > a:hover {
        color: #e63946; /* Red text color on hover */
    }

    .navbar-collapse .dropdown-menu {
        background: rgba(0, 0, 0, 0.8);
        border: none;
    }

    .navbar-collapse .dropdown-menu > li > a {
        color: #fff;
    }

    .navbar-collapse .dropdown-menu > li > a:hover {
        color: #e63946; /* Red text color on hover in dropdown */
    }
</style>
</head>
<body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse">
        <div class="container" style="background-color: #000000;">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <!-- <img src="assets/images/logo.png" alt="Techro HTML5 template"> -->
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right mainNav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class="active"><a href="login.php">Login</a></li>
                    <li class="active"><a href="login.php">Courses</a></li>
                    <li class="active"><a href="contact.php">Feedback</a></li>
                    <li class="active"><a href="displayinfo/index.html">Animation</a></li>
                    <!--<li><a href="fees.php">Fees</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="sidebar-right.php">Right Sidebar</a></li>
                            <li><a href="#">Dummy Link1</a></li>
                            <li><a href="#">Dummy Link2</a></li>
                            <li><a href="#">Dummy Link3</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">Contact</a></li>
                    -->
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <!-- /.navbar -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
