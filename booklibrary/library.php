


<?php
		
		$strconn=mysqli_connect("localhost","root","","project",3308);
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

function sanitizeInput($input) {
    // Use mysqli_real_escape_string or other sanitization techniques as needed
    return htmlspecialchars(trim($input));
}

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
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "Error uploading file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

/* Body */
body {
    background-color: black;
    background-image: url('path-to-your-image.jpg');
    background-size: cover;
    background-attachment: fixed;
    color: white;
    line-height: 1.6;
}

/* Floating Effect */
.library-container, .add-book-form, .category-column, .book {
    background-color: rgba(0, 0, 0, 0.8); /* Transparent black */
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(255, 0, 0, 0.6); /* Red shadow */
    padding: 20px;
    margin: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.library-container:hover, .add-book-form:hover, .category-column:hover, .book:hover {
    transform: translateY(-10px); /* Floating effect */
    box-shadow: 0 16px 32px rgba(255, 0, 0, 0.8); /* Deeper red shadow */
}

/* Header */
.library-header {
    background-color: rgba(255, 0, 0, 0.9); /* Red with slight transparency */
    padding: 20px;
    text-align: center;
    border-bottom: 5px solid rgba(255, 0, 0, 0.9); /* Solid red border */
}

.library-header h1 {
    font-size: 2.5em;
    color: black; /* Black text */
}

/* Forms and Buttons */
.add-book-form {
    background-color: rgba(0, 0, 0, 0.8); /* Transparent black */
    border: 2px solid rgba(255, 0, 0, 0.7); /* Red border */
    color: white;
    padding: 30px;
    width: 60%; /* Increased width */
    margin: 40px auto; /* Centered with more margin */
    border-radius: 15px; /* Rounded corners */
    font-size: 1.2em; /* Larger text */
}

.add-book-form input, .add-book-form button {
    background-color: rgba(0, 0, 0, 0.7); /* Transparent black */
    border: 2px solid rgba(255, 0, 0, 0.7); /* Red border */
    color: white;
    padding: 15px; /* Increased padding */
    margin: 15px 0; /* Increased margin */
    border-radius: 5px;
    width: 100%; /* Full width */
    font-size: 1.2em; /* Larger text */
}

.add-book-form button {
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.add-book-form button:hover {
    background-color: rgba(255, 0, 0, 0.8); /* Brighter red */
    transform: translateY(-5px);
}

/* Category Column */
.category-column h2 {
    color: rgba(255, 0, 0, 0.9); /* Red text */
    text-align: center;
    margin-bottom: 10px;
}

.book h3 {
    color: rgba(255, 0, 0, 0.9); /* Red text */
}

.book a {
    color: rgba(255, 0, 0, 0.9); /* Red links */
    text-decoration: none;
}

.book a:hover {
    text-decoration: underline;
}

/* Unicorn Image */
.unicorn {
    display: block;
    margin: 0 auto;
    width: 50%;
    filter: drop-shadow(0 8px 16px rgba(255, 0, 0, 0.6)); /* Red shadow */
}
/* Hide the default file input */
.add-book-form input[type="file"] {
    opacity: 0;
    position: absolute;
    z-index: -1;
}

/* Custom file upload button */
.custom-file-upload {
    display: inline-block;
    padding: 15px;
    margin: 15px 0;
    border-radius: 5px;
    width: 100%;
    font-size: 1.2em;
    color: white;
    background-color: rgba(255, 0, 0, 0.7); /* Red background */
    border: 2px solid rgba(255, 0, 0, 0.7); /* Red border */
    cursor: pointer;
    text-align: center;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

/* Hover effect for the custom file upload button */
.custom-file-upload:hover {
    background-color: rgba(255, 0, 0, 0.9); /* Brighter red */
    transform: translateY(-5px);
}

/* Ensure the form label and input align */
.custom-file-upload-label {
    position: relative;
    cursor: pointer;
}



    </style>
</head>
<body>
    <div class="library-header">
        <h1>Personal Library</h1>
        <!-- <img src="./images/download (28).jpeg" alt="Unicorn" class="unicorn"> -->
    </div>



    <div class="library-container">

    <div class="add-book-form">
            <h2>Add a New Book</h2>
            <form action="library.php" method="post" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Book Title" required>
                <input type="text" name="author" placeholder="Author" required>
                <input type="text" name="category" placeholder="Category" required>
                <label for="file-upload" class="custom-file-upload-label">
        <span class="custom-file-upload">Choose File</span>
        <input id="file-upload" type="file" name="file" required accept=".pdf">
    </label>
                <button type="submit">Add Book</button>
            </form>
        </div>


        <?php
         if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $query = "SELECT DISTINCT category FROM books WHERE username='$username'";
            $categories_result = mysqli_query($strconn, $query);

            if (!$categories_result) {
                echo "Error: " . mysqli_error($strconn);
            } else {
                while ($category_row = mysqli_fetch_array($categories_result)) {
                    $category = $category_row['category'];
                    
                    echo '<div class="category-column">';
                    echo '<h2>' . $category . '</h2>';

                    $books_query = "SELECT * FROM books WHERE username='$username' AND category='$category'";
                    $books_result = mysqli_query($strconn, $books_query);

                    if (!$books_result) {
                        echo "Error: " . mysqli_error($strconn);
                    } else {
                        while ($book_row = mysqli_fetch_array($books_result)) {
                            echo '<div class="book">';
                            echo '<h3>' . $book_row['title'] . '</h3>';
                            echo '<p>Author: ' . $book_row['author'] . '</p>';
                            // Add link to view or download PDF
                            echo '<a href="' . $book_row['file_path'] . '" target="_blank">Read PDF</a>';
                            echo '</div>';
                        }
                    }

                    echo '</div>'; // Close category-column
                }
            }
        }
        ?>


    </div>
</body>
</html>
