<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>

    <style>
       body {
    background-color: black;
    background-image: url('path-to-your-background-image.jpg'); /* Update with your image path */
    background-size: cover;
    background-attachment: fixed;
    color: white;
    padding-top: 56px; /* To ensure there's space for the navbar */
}

/* Navbar */
nav {
    background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent black */
}

nav a {
    color: white;
}

/* Form */
.form {
    border: 2px solid rgba(255, 0, 0, 0.8); /* Red border */
    padding: 1rem;
    border-radius: 15px;
    background-color: rgba(0, 0, 0, 0.7); /* Transparent black */
    box-shadow: 0 8px 16px rgba(255, 0, 0, 0.6); /* Red shadow */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-top: 20px;
}

.form:hover {
    transform: translateY(-10px); /* Floating effect */
    box-shadow: 0 16px 32px rgba(255, 0, 0, 0.8); /* Deeper red shadow */
}

/* Form Labels */
.form-label {
    font-weight: bold;
    color: #ffcccc; /* Light red */
}

/* Container */
.container {
    margin-top: 20px;
}

/* Card */
.card {
    background-color: rgba(0, 0, 0, 0.7); /* Transparent black */
    border: 2px solid rgba(255, 0, 0, 0.8); /* Red border */
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(255, 0, 0, 0.6); /* Red shadow */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-10px); /* Floating effect */
    box-shadow: 0 16px 32px rgba(255, 0, 0, 0.8); /* Deeper red shadow */
}

.card-title {
    color: #ffcccc; /* Light red */
}

.card-text {
    color: #ff9999; /* Slightly darker red */
}

/* Buttons */
.btn-primary {
    background-color: rgba(255, 0, 0, 0.8); /* Red background */
    border: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-primary:hover {
    background-color: rgba(255, 0, 0, 1); /* Brighter red */
    transform: translateY(-5px);
}

.btn-danger {
    background-color: rgba(200, 0, 0, 0.8); /* Darker red */
    border: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-danger:hover {
    background-color: rgba(200, 0, 0, 1); /* Brighter darker red */
    transform: translateY(-5px);
}

/* Search Input */
#search {
    background-color: rgba(0, 0, 0, 0.5); /* Transparent black */
    color: white;
    border: 2px solid rgba(255, 0, 0, 0.8); /* Red border */
    border-radius: 5px;
    padding: 10px;
    margin-top: 20px;
}

    </style>
</head>

<body>
 
    <?php include "./navbar.php";
    $strconn=mysqli_connect("localhost","root","","project",3308);
    if(!$strconn)
        echo "Connection failed".mysqli_connect_error();
    else{}
    
    ?>
    <!-- <?php include "../connect.php"; ?> -->
    <?php include "./edit.php"; ?>

    <?php 
    if (isset($_POST['submit']) && !isset($_POST['hidden'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $sql = "INSERT INTO `notes`(`title`, `description`) VALUES ('$title', '$description')";
        $res = mysqli_query($strconn, $sql);
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form class="form mt-4" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea class="form-control" id="desc" name="description" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add note</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <h1>YOUR NOTES</h1>
                <div class="row">
                    <?php 
                    $sql = "SELECT * FROM `notes`";
                    $res = mysqli_query($strconn, $sql);
                    $noNotes = true;

                    while ($fetch = mysqli_fetch_assoc($res)) {
                        $noNotes = false;
                        echo '<div class="col-md-3 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">' . $fetch["title"] . '</h5>
                                    <p class="card-text">' . $fetch["description"] . '</p>
                                    <button type="button" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#exampleModal" id="' . $fetch["sno"] . '">Edit</button>
                                    <a href="./delete.php?id=' . $fetch["sno"] . '" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>';
                    }

                    if ($noNotes) {
                        echo '<div class="col-md-3 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Message:</h5>
                                    <p class="card-text">NO notes are available</p>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const editButtons = document.querySelectorAll(".edit");
        const editTitle = document.getElementById("edittitle");
        const editDesc = document.getElementById("editdesc");
        const hiddenInput = document.getElementById("hidden");
        const cardBody = document.querySelectorAll(".card-body");

        editButtons.forEach(button => {
            button.addEventListener("click", () => {
                const titleText = button.parentElement.querySelector(".card-title").innerText;
                const descText = button.parentElement.querySelector(".card-text").innerText;
                editTitle.value = titleText;
                editDesc.value = descText;
                hiddenInput.value = button.id;
            });
        });

        const search = document.getElementById('search');
        search.addEventListener("input", () => {
            const value = search.value.toLowerCase();
            cardBody.forEach(element => {
                const titleText = element.querySelector(".card-title").innerText.toLowerCase();
                const descText = element.querySelector(".card-text").innerText.toLowerCase();
                if (titleText.includes(value) || descText.includes(value)) {
                    element.parentElement.style.display = "block";
                } else {
                    element.parentElement.style.display = "none";
                }
            });
        });
    });
    </script>
</body>
</html>
