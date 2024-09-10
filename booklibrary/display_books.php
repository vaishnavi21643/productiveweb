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



$sql = "SELECT users.firstname, categories.name as category, books.title, books.pdf_path FROM books 
        JOIN users ON books.user_id = users.id 
        JOIN categories ON books.category_id = categories.id";
$result = $strconn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='books'>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='book'>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>Author: " . $row['firstname'] . "</p>";
        echo "<p>Category: " . $row['category'] . "</p>";
        echo "<a href='" . $row['pdf_path'] . "' target='_blank'>Read</a>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No books found.";
}

$strconn->close();
?>
