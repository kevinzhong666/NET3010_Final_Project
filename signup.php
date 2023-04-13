<?php
// Start the session
session_start();

function emailExists($conn, $email) {
    $email_query = "SELECT email FROM users WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $emailExists = $stmt->num_rows > 0;
    $stmt->close();
    return $emailExists;
}

// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_DB";

// Create connection to SQL
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$db_query = "CREATE DATABASE IF NOT EXISTS " . $dbname;

//check for creation of database
if ($conn->query($db_query) === FALSE) {
    echo "Error creating database: " . $conn->error . "<br>";
}

//create connection to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Create table to store user information
$table_query = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    preferred VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    dob DATE NOT NULL
)";

//check for creation of table
if ($conn->query($table_query) === False) {
    echo "Error creating table: " . $conn->error . "<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Sign_up"])) {
    $firstname = $conn->real_escape_string($_POST["fname"]);
    $lastname = $conn->real_escape_string($_POST["lname"]);
    $preferred = $conn->real_escape_string($_POST["pname"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password1"]);
    $dob = $conn->real_escape_string($_POST["dob"]);

    if (emailExists($conn, $email)) {
        echo '<script>document.getElementById("error-message").innerText = "Error: Email already exists.";</script>';    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO users (firstname, lastname, preferred, email, password, dob)
        VALUES ('$firstname', '$lastname', '$preferred', '$email', '$hashed_password', '$dob')";

        if ($conn->query($insert_query) === TRUE) {
            // Log the user in
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            
            // Redirect to index.php
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>



<?php include ('head.php'); ?>
<body>
<?php include ('header.php'); ?>
<?php include ('nav.php'); ?>
    <h2 class="text">Create a Weather Hub Account</h2>
    <p id="error-message" style="color: red;"></p>
    <form method = "post" action= '' id="signup" onsubmit="return validateForm()">
        <div>
            <p>Required Information</p>
        </div>

        <div>
            <label for="fname">First Name</label>
            <br>
            <input type="text" id="fname" name="fname" placeholder="Your First Name Here">
        </div>

        <div>
            <label for="lname">Last Name</label>
            <br>
            <input type="text" id="lname" name="lname" placeholder="Your Last Name Here">
        </div>

        <div>
            <label for="pname">Preferred Name</label>
            <br>
            <input type="text" id="pname" name="pname" placeholder="Your Name Here">
        </div>
    
        <div>
            <label for="email">Email</label>
            <br>
            <input type="email" id="email" name="email" placeholder="example@email.com">
        </div>

        <div>
            <label for="password1">Password</label>
            <br>
            <input type="password" name="password1" id="password1" oninput="showLastChar(this);" required>
        </div>

        <div>
            <label for="password2">Confirm Password</label>
            <br>
            <input type="password" name="password2" id="password2" oninput="showLastChar(this);" required>
        </div>
    
        <div>
            <br>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">
            <br>          
        </div>

        <div>
            <label>What kind of quotes do you want to see on your page?:</label><br>
            <input type="radio" id="funny" name="quotes" value="funny">
            <label for="funny">Funny</label><br>
            <input type="radio" id="inspirationaal" name="quotes" value="inspirationaal">
            <label for="inspirationaal">Inspirationaal</label><br>
            <input type="radio" id="bible" name="quotes" value="bible">
            <label for="bible">Bible</label>
            <br>
        </div>
        

        <div>
            <p>Optional</p>
            <br>
            <p>How'd you hear about us?</p>
            <input type="radio" id="social-media" name="referral-source" value="social-media">
            <label for="social-media">Social Media</label>
            <br>
            <input type="radio" id="advertising" name="referral-source" value="advertising">
            <label for="advertising">Advertising</label>
            <br>
            <input type="radio" id="word-of-mouth" name="referral-source" value="word-of-mouth">
            <label for="friendfamily">Friend/Family</label>
            <br>
            <input type="radio" id="internet-search" name="referral-source" value="internet-search">
            <label for="internet-search">Internet Search</label>
            <br>
            <input type="radio" id="other" name="referral-source" value="other">
            <label for="other">Other</label>
            <br>
            <input type="text" id="other-input" name="other-input" placeholder="Please specify">
            <br>
        </div>

        <input type="submit" name="Sign_up" value = "Sign Up">
        <p>By clicking submit, you agree to our <a href="tos.php">Terms of Service</a>. <br>
            You also give your consent to recieving email updates and newsletters from WeatherHub as we do not wish to take your money.</p>
    </form>
    
    
    <?php include ('footer.php'); ?>
    <script>
    // Get the radio button and text input elements
    var referredBy = document.getElementById("other"); // Multiple choice style selection
    var referredByOther = document.getElementById("other-input"); // Text based answer

    function showLastChar(inputElem) {
        const newPassword = inputElem.value.split('');
        if (inputElem.dataset.displayedCharTimeout) {
            clearTimeout(inputElem.dataset.displayedCharTimeout);
        }

        if (newPassword.length > 0) {
            inputElem.type = 'text';
            inputElem.value = newPassword.map((char, index) => (index === newPassword.length - 1 ? char : '•')).join('');

            inputElem.dataset.displayedCharTimeout = setTimeout(() => {
                inputElem.type = 'password';
                inputElem.value = newPassword.join('');
            }, 1000);
        }
    }          

    // Set the referredByOther input to be hidden by default
    referredByOther.style.display = "none";

    // Add an event listener to the radio button group
    referredBy.addEventListener("change", function() 
    {
        // If the "Other" option is selected, show the text input
        if (referredBy.checked) 
        {
            referredByOther.style.display = "block"; // Show text box when other is checked
        } 
        else 
        {
            referredByOther.style.display = "none"; // Hide the text box if other is not checked
            referredByOther.value = ""; // clear the input field when not required
        }
    });

    document.getElementById("signup").addEventListener("submit", function(event) {
        var inputsToCheck = ["fname", "lname", "pname", "email", "password1", "password2"];
        var valid = true;
        var errorMessageElement = document.getElementById("error-message");
        errorMessageElement.innerText = "";

        for (var i = 0; i < inputsToCheck.length; i++) {
            var input = document.getElementById(inputsToCheck[i]);
            if (input.value.trim() === "") {
                errorMessageElement.innerText = "Please fill in all fields.";
                input.focus();
                valid = false;
                break;
            }
        }

        if (valid) {
            var password1 = document.getElementById("password1");
            var password2 = document.getElementById("password2");

            if (password1.value !== password2.value) {
                errorMessageElement.innerText = "Passwords do not match.";
                password1.focus();
                valid = false;
            }
        }

        if (!valid) {
            event.preventDefault();
        }
    });
    </script>
</body>
</html>