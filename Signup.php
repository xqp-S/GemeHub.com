<?php
session_start();
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "cs378"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['check_email'])) {
    $Email = $_GET['check_email'];
    $checkEmailSql = "SELECT Email FROM register WHERE Email = ?";
    $stmtCheck = $conn->prepare($checkEmailSql);
    $stmtCheck->bind_param("s", $Email);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    if ($stmtCheck->num_rows > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
    $stmtCheck->close();
    $conn->close();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT); 

    $checkEmailSql = "SELECT Email FROM register WHERE Email = ?";
    $stmtCheck = $conn->prepare($checkEmailSql);
    $stmtCheck->bind_param("s", $Email);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    if ($stmtCheck->num_rows > 0) {
        header("Location: Register.html?error=email_taken");
        exit();
    } else {
        $sql = "INSERT INTO register (Username, Email, Password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $Username, $Email, $Password);

        if ($stmt->execute()) {
            $_SESSION['Username'] = $Username;
            $_SESSION['Email'] = $Email;
            header("Location: index.html");
            exit();
        } else {
            header("Location: Register.html?error=registration_failed");
            exit();
        }
        $stmt->close();
    }
    $stmtCheck->close();
}

$conn->close();
?>