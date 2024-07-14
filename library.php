<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unicorn Library</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Personal Library</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="firstname" placeholder="Your Name" required><br>
            <input type="text" name="category" placeholder="Category" required><br>
            <input type="text" name="title" placeholder="Book Title" required><br>
            <input type="file" name="pdf" accept="application/pdf" required><br>
            <button type="submit">Upload Book</button>
        </form>
        <div id="books">
            <?php
             include 'display_books.php'; 
            ?>
        </div>
    </div>
</body>
</html>
