<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) 
    {
        // User exists, set session variable
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;

        // Redirect to index page
        header("Location: index.php");
    } 
    else 
    {
        // Invalid credentials
        header("Location: loginPage.php?error=invalid");
    }

    $stmt->close();
}

$conn->close();
?>
