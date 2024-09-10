<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Styling</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* General Body Styles */
		body {
            background: linear-gradient(135deg, #000000 0%, #e63946 100%);
            color: #fff;
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Footer Styles */
        #footer {
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 20px 0;
        }

        .social a {
            color: #fff;
            font-size: 24px;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .social a:hover {
            color: #e63946; /* Red color on hover */
        }

        .footer2 {
            background: #000000; /* Black background */
            padding: 10px 0;
        }

        .footer2 .panel {
            padding: 0;
        }

        .footer2 .simplenav a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer2 .simplenav a:hover {
            color: #e63946; /* Red color on hover */
        }

        .footer2 .panel-body {
            text-align: center;
        }

        .blockquote-1 {
            border-left: 4px solid #e63946;
            padding-left: 15px;
            margin: 20px 0;
            color: #fff;
        }

        .blockquote-1 p {
            font-style: italic;
        }

        .blockquote-1 small {
            color: #e63946;
        }
    </style>
</head>
<body>
    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <div class="social text-center">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-flickr"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>
            </div>

            <div class="clear"></div>
            <!-- CLEAR FLOATS -->
        </div>
        <!-- <div class="footer2">
            <div class="container" style="background-color: Black;">
                <div class="row">
                    <div class="col-md-6 panel">
                        <div class="panel-body">
                            <p class="simplenav">
                                <a href="index.php">Home</a> | 
                                <a href="login.php">Login</a> | 
                                <a href="login.php">Courses</a> |
                                <a href="contact.php">Feedback</a>
                            </p>
                        </div>
                    </div> -->

                    

                </div>
                <!-- /row of panels -->
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
