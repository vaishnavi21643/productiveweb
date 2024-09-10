<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['firstname'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $pdf = $_FILES['pdf'];

    if ($pdf['type'] == "application/pdf") {
        $pdfPath = 'uploads/' . basename($pdf['name']);
        move_uploaded_file($pdf['tmp_name'], $pdfPath);

        // Insert user if not exists
        $userQuery = "INSERT INTO users (firstname) VALUES ('$user') ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id)";
        $conn->query($userQuery);
        $userId = $conn->insert_id;

        // Insert category if not exists
        $categoryQuery = "INSERT INTO categories (name) VALUES ('$category') ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id)";
        $conn->query($categoryQuery);
        $categoryId = $conn->insert_id;

        // Insert book
        $bookQuery = "INSERT INTO books (user_id, category_id, title, pdf_path) VALUES ($userId, $categoryId, '$title', '$pdfPath')";
        $conn->query($bookQuery);

        echo "Book uploaded successfully!";
    } else {
        echo "Please upload a PDF file.";
    }
}


?>
