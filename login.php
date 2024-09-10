<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="eLearning is a modern and fully responsive Template by WebThemez.">
    <meta name="author" content="webThemez.com">
    <title>eLearning - Free Educational Responsive Web Template</title>
    <link rel="favicon" href="assets/images/favicon.png">
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/da-slider.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <style>
            html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(to right, #ff0000, #000000);
            color: #ffffff;
            flex: 1;
        }
        header#head {
            background: #333;
            color: #fff;
            padding: 60px 0;
            text-align: center;
        }
        
        .form-control {
            border-radius: 10px;
        }

        .btn {
            background-color: #680000; /* Dark red */
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            margin: 10px 0;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            background-color: #a30000; /* Even darker red */
            transform: scale(1.05);
        }

        table {
            margin: 0 auto;
            padding: 20px;
        }

        th, td {
            padding: 15px;
        }

        .alert {
            margin: 20px;
            padding: 15px;
            border-radius: 5px;
        }

        .alert-danger {
            background-color: #ffdddd;
            color: #a94442;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
        }

        footer#footer {
            background: #000;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        footer#footer .social a {
            color: #fff;
            margin: 0 10px;
            font-size: 20px;
            transition: color 0.3s;
        }

        footer#footer .social a:hover {
            color: #ff0000;
        }

        .footer2 {
            background: #222;
            padding: 20px 0;
        }

        .footer2 .simplenav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 16px;
        }

        .footer2 .simplenav a:hover {
            color: #ff0000;
        }
		.content {
            flex: 1;
        }
    </style>
</head>
<body>
    <?php
        include "nav.php";
        $strconn = mysqli_connect("localhost", "root", "", "project", 3308);
        if (!$strconn) {
            echo "Connection failed" . mysqli_connect_error();
        } else {}
    ?>
    
    <header id="head" class="secondary" style="background-color:#680000; ">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </header>
    <br>
    <form action="" method="post">
        <table border="0" align="center">
            <tr>
                <td><label>Enter your User Name:</label></td>
                <td><input type="text" class="form-control" name="id" placeholder="User Name"></td>
            </tr>
            <tr>
                <td><label>Enter your Password:</label></td>
                <td><input type="password" class="form-control" name="pass" placeholder="Password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button name="btnsubmit" class="btn btn-block">Submit</button></td>
            </tr>
            <!-- <tr>
                <td colspan="2" align="center"><button name="btnforget" class="btn btn-block">Forgot Password?</button></td>
            </tr> -->
            <tr>
                <td colspan="2" align="center"><a href="reg.php" class="btn btn-block">Create Account?</a></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><a href="expertlogin.php" class="btn btn-block">Login As Expert</a></td>
            </tr>
        </table>
    </form>
    
    <?php
    if (!empty($_POST['id']) && !empty($_POST['pass'])) {
        if (isset($_POST['btnsubmit'])) {
            $name = $_POST["id"]; 
            $password = $_POST["pass"]; 
            $query = "SELECT * FROM user_info WHERE UserName='$name' and Password='$password'";
            $result = mysqli_query($strconn, $query);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                session_start();
                $_SESSION["username"] = $_POST['id'];
                echo("<script>location.href = 'user/index.php';</script>");
            } else {
                echo "<div class='alert alert-danger' role='alert'>Username or password is incorrect..Try again</div>";
            }
        }
    }
    ?>

    <?php
        include "footer.php";
    ?>
</body>
</html>
