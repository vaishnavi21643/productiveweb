<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        /* CSS */* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background-color: #f9e8f4; /* Light pink background */
            color: #6a2c70; /* Purple text */
            line-height: 1.6;
        }
        
        .navbar2 {
            background-color: #b19cd9; /* Light purple navbar background */
            padding: 10px 20px;
            text-align: center;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;

        }
        
        .username {
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
        }
        
        .navbar {
            top: 20px;
            background-color: #fde0f7; /* Light pink navbar background */
            padding: 10px;
            margin-bottom: 20px;
        }
        
        .navbar ul {
            list-style-type: none;
            display: flex;
            justify-content: center;
        }
        
        .navbar li {
            margin: 0 10px;
        }
        
        .navbar a {
            text-decoration: none;
            color: #6a2c70; /* Purple text */
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .navbar a:hover {
            background-color: #b19cd9; /* Light purple hover */
        }
        
        /* Style the links inside the sidenav */
#mySidenav a {
   
  position: absolute; /* Position them relative to the browser window */
  left: -80px; /* Position them outside of the screen */
  transition: 0.3s; /* Add transition on hover */
  padding: 15px; /* 15px padding */
  width: 100px; /* Set a specific width */
  text-decoration: none; /* Remove underline */
  font-size: 20px; /* Increase font size */
  color: white; /* White text color */
  border-radius: 0 5px 5px 0; /* Rounded corners on the top right and bottom right side */
}

#mySidenav a:hover {
  left: 0; /* On mouse-over, make the elements appear as they should */
}

/* The about link: 20px from the top with a green background */
#about {
  top: 80px;
  background-color: #04AA6D;
}

#blog {
  top: 140px;
  background-color: #2196F3; /* Blue */
}

#projects {
  top: 200px;
  background-color: #f44336; /* Red */
}

#contact {
  top: 260px;
  background-color: #555 /* Light Black */
}
      
    </style>
</head>
<body>
    <div class="navbar2">
    <div class="header">
        <p class="username">
        Hello <?php 
        if(isset($_SESSION['email'])){
            $email=$_SESSION['email'];
            $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
            while($row=mysqli_fetch_array($query)){
                echo $row['firstname'].' '.$row['lastname'];
            }
        }
        ?>
        :)
        
        </p>
       
    </div>
    </div>
    <nav class="navbar">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#profile">Profile</a></li>
            <li><a href="#settings">Settings</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="logout.php">Logout</a></li>
            
        </ul>
    </nav>
    
    <div id="mySidenav" class="sidenav">
  <a href="#" id="about">About</a>
  <a href="#" id="blog">Blog</a>
  <a href="#" id="projects">Projects</a>
  <a href="#" id="contact">Contact</a>
                    </div>
       
   

  
</body>
</html>
