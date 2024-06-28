<?php
session_start();
include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Login</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        text-align: center;
        margin-top: 50px;
    }
    .login-container {
        width: 300px;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        margin: auto;
    }
    .login-container h2 {
        margin-bottom: 20px;
    }
    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .login-container input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .login-container input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<div class="login-container">
    <h2>User Login</h2>
    <form action="homepage.php" method="post">
        <input type="text" id="username" name="username" placeholder="Username" required><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>
