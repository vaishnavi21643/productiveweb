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
            background-color: black; /* Light pink background */
            color: #6a2c70; /* Purple text */
            line-height: 1.6;
            background-image: url("images/50eef1d8-8a27-4670-bce8-c442de015105.jpeg");
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
            background-color: hsla(282, 94%, 67%, 0.845); /* Light pink navbar background */
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
  font-size: 12px; /* Increase font size */
  color: white; /* White text color */
  border-radius: 0 5px 5px 0; /* Rounded corners on the top right and bottom right side */
}

#mySidenav a:hover {
  left: 0; /* On mouse-over, make the elements appear as they should */
}

/* The about link: 20px from the top with a green background */
#A1 {
    top: 80px;
    background-color: hsla(343, 95%, 64%, 0.945);
    transition: box-shadow 0.3s ease, left 0.3s ease;
   
}

#A1:hover {
    box-shadow: 0 0 20px #bb86fc, 0 0 30px #bb86fc, 0 0 40px #bb86fc;
    left: 0;
}


#A2 {
  top: 160px;
  background-color: hsla(343, 95%, 64%, 0.945); 
  transition: box-shadow 0.3s ease, left 0.3s ease;
  
}
#A2:hover {
    box-shadow: 0 0 20px #bb86fc, 0 0 30px #bb86fc, 0 0 40px #bb86fc;
    left: 0;
}
#A3 {
  top: 220px;
  background-color: hsla(343, 95%, 64%, 0.945); 
  transition: box-shadow 0.3s ease, left 0.3s ease;
  
}
#A3:hover {
    box-shadow: 0 0 20px #bb86fc, 0 0 30px #bb86fc, 0 0 40px #bb86fc;
    left: 0;
}

#A4 {
  top: 280px;
  background-color: hsla(343, 95%, 64%, 0.945) ;
  transition: box-shadow 0.3s ease, left 0.3s ease;
  
}
#A4:hover {
    box-shadow: 0 0 20px #bb86fc, 0 0 30px #bb86fc, 0 0 40px #bb86fc;
    left: 0;
}


#A5 {
  top: 340px;
  background-color:  hsla(343, 95%, 64%, 0.945);
  transition: box-shadow 0.3s ease, left 0.3s ease;
  
}
#A5:hover {
    box-shadow: 0 0 20px #bb86fc, 0 0 30px #bb86fc, 0 0 40px #bb86fc;
    left: 0;
}
#A6 {
  top: 400px;
  background-color: hsla(343, 95%, 64%, 0.945); 
  transition: box-shadow 0.3s ease, left 0.3s ease;
  
}
#A6:hover {
    box-shadow: 0 0 20px #bb86fc, 0 0 30px #bb86fc, 0 0 40px #bb86fc;
    left: 0;}


#A7 {
  top: 460px;
  background-color:hsla(343, 95%, 64%, 0.945); 
  transition: box-shadow 0.3s ease, left 0.3s ease;
  
}
#A7:hover {
    box-shadow: 0 0 20px #bb86fc, 0 0 30px #bb86fc, 0 0 40px #bb86fc;
    left: 0;}

#A8 {
  top: 520px;
  background-color: hsla(343, 95%, 64%, 0.945) ;
  transition: box-shadow 0.3s ease, left 0.3s ease;
  
}
#A8:hover {
    box-shadow: 0 0 20px #bb86fc, 0 0 30px #bb86fc, 0 0 40px #bb86fc;
    left: 0;}
/*     
DROP DOWN CONTENT */
.dropdown-content {
            display: none;
            position: absolute;
            background-color: #fde0f7; /* Light pink background */
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: #6a2c70; /* Purple text */
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #b19cd9; /* Light purple hover */
        }

        .navbar li:hover .dropdown-content {
            display: block;
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
        
        
        </p>
       
    </div>
    </div>
    <nav class="navbar">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#profile">Profile</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="#settings">MORE</a>
            
                <div class="dropdown-content">
                    <a href="">QUIZES</a>
                    <a href="#link2">SMALL RECIPES!</a>
                    <a href="#link3">MOTIVATING VLOGS</a>
                </div>
            </li>
        </ul>
    </nav>
    
    <div id="mySidenav" class="sidenav">
  <a href="pomo.html" id="A1">POMO-TIMER</a>
  <a href="#" id="A2">TO-DO LIST</a>
  <a href="#" id="A3">RECORDER</a>
  <a href="library.php" id="A4">LIBRARY</a>
  <a href="#" id="A5">ALARM</a>
  <a href="#" id="A6">WEATHER</a>
  <a href="#" id="A7">NOTES</a>
  <a href="#" id="A8">VISION BOARD</a>
</div>
       
   

  
</body>
</html>
