<?php
		
		$strconn=mysqli_connect("localhost","root","","project");
		if(!$strconn)
			echo "Connection failed".mysqli_connect_error();
		else{}
		session_start();
		if(isset($_SESSION["username"]))
		{
			$username=$_SESSION["username"];
		}
		else{ echo "<div class='alert alert-danger' role='alert'>Something went wrong try login again.</div>";

		}
	?>





<?php


// Function to sanitize input
function sanitizeInput($input) {
    // Use mysqli_real_escape_string or other sanitization techniques as needed
    return htmlspecialchars(trim($input));
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $title = sanitizeInput($_POST['title']);
    $author = sanitizeInput($_POST['author']);
    $category = sanitizeInput($_POST['category']);

    // Check if file was uploaded without errors
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];

        // Move uploaded file to a permanent location
        $upload_directory = 'uploads/';
        $file_path = $upload_directory . $file_name;
        if (move_uploaded_file($file_tmp, $file_path)) {
            // Insert book details into database
            $query = "INSERT INTO books (username, title, author, category, file_path) VALUES ('$username', '$title', '$author', '$category', '$file_path')";
            mysqli_query($strconn, $query);

            // Redirect back to library.php or any other page
            header("Location: library.php");
            exit();
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "Error uploading file.";
    }
}
?>
