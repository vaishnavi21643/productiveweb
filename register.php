<?php 
session_start();
include 'connect.php';

if(isset($_POST['signUp'])){
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordHashed = md5($password);

    // Check if email already exists
    $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if($result->num_rows > 0){
        echo "Email Address Already Exists!";
    } else {
        // Insert new user
        $insertQuery = $conn->prepare("INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
        $insertQuery->bind_param("ssss", $firstName, $lastName, $email, $passwordHashed);
        
        if($insertQuery->execute()){
            // Set session variables
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['fName'] = $firstName;
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }
    $checkEmail->close();
    $insertQuery->close();
}

if(isset($_POST['signIn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordHashed = md5($password);

    // Check email and password
    $sql = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $sql->bind_param("ss", $email, $passwordHashed);
    $sql->execute();
    $result = $sql->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: homepage.php");
        exit();
    } else {
        echo "Incorrect Email or Password";
    }
    $sql->close();
}

$conn->close();
?>
