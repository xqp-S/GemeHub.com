<?php
session_start();

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

// Check if 'check_username' is passed in the URL query string
if (isset($_GET['check_username'])) {
    // Sanitize the input to avoid any malicious input
    $Username = mysqli_real_escape_string($conn, $_GET['check_username']);

    // Prepare SQL to check if the username exists
    $checkUserSql = "SELECT Username FROM register WHERE Username = ?";
    $stmtCheck = $conn->prepare($checkUserSql);
    $stmtCheck->bind_param("s", $Username);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    // Return JSON response based on whether the username exists
    if ($stmtCheck->num_rows > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }

    // Close the prepared statement and database connection
    $stmtCheck->close();
    $conn->close();
    exit(); // Exit to stop the script here
}

// Check if the form has been submitted via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $Password = $_POST['Password']; // Do not sanitize passwords, as we will compare hashed versions

    // Special check for admin login
    if ($Username === "admin" && $Password === "admin") {
        header("Location: admin.html");
        exit();
    }

    // Prepare SQL query to check if the user exists in the database
    $sql = "SELECT * FROM register WHERE Username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user with this username exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password using password_verify() for security
        if (password_verify($Password, $user['Password'])) {
            // If password is correct, start a session and redirect
            $_SESSION['Username'] = $user['Username']; 
            header("Location: index.html");
            exit();
        } else {
            // If password is incorrect, redirect to login page with error
            header("Location: login.html?error=invalid_login");
            exit();
        }
    } else {
        // If username doesn't exist, redirect to login page with error
        header("Location: login.html?error=no_user");
        exit();
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
