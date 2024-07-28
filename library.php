<?php
session_start();
include("connect.php");
function sanitizeInput($input) {
    // Use mysqli_real_escape_string or other sanitization techniques as needed
    return htmlspecialchars(trim($input));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
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
            $query = "INSERT INTO books (user_email, title, author, category, file_path) VALUES ('$email', '$title', '$author', '$category', '$file_path')";
            mysqli_query($conn, $query);
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
        /* CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Comic Sans MS', cursive, sans-serif; /* Cute font */
        }
        
        body {
            background-color: #eaa2f3; /* Light pink background */
            color: #6a2c70; /* Purple text */
            line-height: 1.6;
        }
        
        .library-header {
            background-color: #d399fadd; /* Light pink */
            padding: 20px;
            text-align: center;
            border-bottom: 5px solid #e0f7fa; /* Light cyan */
        }

        .library-header h1 {
            font-size: 2.5em;
            color: #310151dd; /* Hot pink */
        }

        .library-container {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            flex-wrap: wrap; /* Allow items to wrap to new line */
        }

        .category-column {
            width: 30%; /* Adjust as needed */
            background-color: #ffe4e1; /* Light pink */
            border: 2px solid #ffb6c1; /* Light pink */
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
        }

        .category-column h2 {
            font-size: 2em;
            color: #ff69b4; /* Hot pink */
            text-align: center;
            margin-bottom: 10px;
        }

        .book {
            background-color: #e1bee7; /* Light purple */
            border: 2px solid #ce93d8; /* Lighter purple */
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .add-book-form {
            background-color: #e0f7fa; /* Light cyan */
            border: 2px solid #b2ebf2; /* Lighter cyan */
            border-radius: 10px;
            padding: 20px;
            width: 80%;
            margin: 20px auto;
        }

        .add-book-form input, .add-book-form button {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 2px solid #b2ebf2; /* Lighter cyan */
            width: 100%;
        }

        .add-book-form button {
            background-color: #ff69b4; /* Hot pink */
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-book-form button:hover {
            background-color: #ff1493; /* Deep pink */
        }

        .unicorn {
            display: block;
            margin: 0 auto;
            width: 50%;
        }

    </style>
</head>
<body>
    <div class="library-header">
        <h1>Unicorn Library</h1>
        <img src="images/download (28).jpeg" alt="Unicorn" class="unicorn">
    </div>

    <div class="library-container">
        <?php
         if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = "SELECT DISTINCT category FROM books WHERE user_email='$email'";
            $categories_result = mysqli_query($conn, $query);

            if (!$categories_result) {
                echo "Error: " . mysqli_error($conn);
            } else {
                while ($category_row = mysqli_fetch_array($categories_result)) {
                    $category = $category_row['category'];
                    
                    echo '<div class="category-column">';
                    echo '<h2>' . $category . '</h2>';

                    $books_query = "SELECT * FROM books WHERE user_email='$email' AND category='$category'";
                    $books_result = mysqli_query($conn, $books_query);

                    if (!$books_result) {
                        echo "Error: " . mysqli_error($conn);
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

<div class="add-book-form">
            <h2>Add a New Book</h2>
            <form action="library.php" method="post" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Book Title" required>
                <input type="text" name="author" placeholder="Author" required>
                <input type="text" name="category" placeholder="Category" required>
                <input type="file" name="file" required accept=".pdf">
                <button type="submit">Add Book</button>
            </form>
        </div>
    </div>
</body>
</html>
