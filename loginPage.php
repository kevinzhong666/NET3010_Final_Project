<?php
session_start();

// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_DB";

// Create connection to SQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user;
            header("Location: index.php");
            exit();
        } else {
            $_SESSION["login_error"] = "Invalid email or password.";
            header("Location: loginPage.php");
            exit();
        }
    } else {
        $_SESSION["login_error"] = "Invalid email or password.";
        header("Location: loginPage.php");
        exit();
    }

    $stmt->close();
}
?>

<?php include ('head.php'); ?>

<body>
<?php include ('header.php'); ?>
<?php include ('nav.php'); ?>
    <h2>Sign in to your Weather Hub Account</h2>

    <form id="login" onsubmit="return validateForm()" action="loginPage.php" method="POST">
        <?php
            if (isset($_SESSION["login_error"])) {
            echo "<div class='error'>" . $_SESSION["login_error"] . "</div>";
            unset($_SESSION["login_error"]);
            }
        ?>
        <div>
            <label for="email">Email Address</label>
            <br>
            <input type="email" id="email" name="email" placeholder="Email">
        </div>
    
        <div>
            <label for="password">Password</label>
            <br>
            <input type="password" id="password" name="password" placeholder="Password">
        </div>
        <br>
        <button type="submit">Login</button> 
    </form>
    
</body>
<script>
    function validateForm() {
        var form = document.getElementById("login");
        var inputs = form.getElementsByTagName("input");

        for (var i = 0; i < inputs.length; i++) {
            if ((inputs[i].type == "email" || inputs[i].type == "password") && inputs[i].value == "") {
                alert("Please fill out all text boxes.");
                return false;
            }
        }

        return true;
    }
</script>
<?php include ('footer.php'); ?>
</html>

<?php
$conn->close();
?>
