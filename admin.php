<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "cs378"; 

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection failed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is for adding a product
    if (isset($_POST['action']) && $_POST['action'] === 'add_product') {
        $gameName = mysqli_real_escape_string($conn, $_POST['game_name']);
        $platform = mysqli_real_escape_string($conn, $_POST['platform']);
        $genre = mysqli_real_escape_string($conn, $_POST['genre']); // Genre field
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $mainImage = mysqli_real_escape_string($conn, $_POST['main_image']);
        $smallImage1 = mysqli_real_escape_string($conn, $_POST['small_image1']);
        $smallImage2 = mysqli_real_escape_string($conn, $_POST['small_image2']);
        $smallImage3 = mysqli_real_escape_string($conn, $_POST['small_image3']);
        $smallImage4 = mysqli_real_escape_string($conn, $_POST['small_image4']);

        $insertSql = "INSERT INTO products (Name, Platform, Genre, Price, `Main-img`, `Small-img1`, `Small-img2`, `Small-img3`, `Small-img4`, Description) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtInsert = $conn->prepare($insertSql);
        $stmtInsert->bind_param("sssdssssss", $gameName, $platform, $genre, $price, $mainImage, $smallImage1, $smallImage2, $smallImage3, $smallImage4, $description);

        if ($stmtInsert->execute()) {
            echo "Product added successfully!";
        } else {
            echo "Error adding product: " . $stmtInsert->error;
        }

        $stmtInsert->close();

        // Redirect to admin.html
        header("Location: admin.html");
        exit();
    }

    // Check if the form is for removing a product
    if (isset($_POST['action']) && $_POST['action'] === 'remove_product') {
        $gameId = mysqli_real_escape_string($conn, $_POST['game_id']);

        $deleteSql = "DELETE FROM products WHERE ID = ?";
        $stmtDelete = $conn->prepare($deleteSql);
        $stmtDelete->bind_param("i", $gameId);

        if ($stmtDelete->execute()) {
            echo "Product removed successfully!";
        } else {
            echo "Error removing product: " . $stmtDelete->error;
        }

        $stmtDelete->close();

        // Redirect to admin.html
        header("Location: admin.html");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
