<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="user_DB";
$dbname = "CREATE DATABASE IF NOT EXISTS user_DB";

// Creating a connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


// Creating a database named user_DB
if (mysqli_query($conn, $dbname)) {
    echo "Database created successfully";
  } else {
    $dbname = "CREATE DATABASE user_DB";
  }

 //create table in database named users
//somehow create the table that will hold info

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

//make a check to see if info was added

// closing connection
$conn->close();
?>

<?php include ('head.php'); ?>
<body>
<?php include ('header.php'); ?>
<?php include ('nav.php'); ?>
    <h2 class="text">Create a Weather Hub Account</h2>


    
    <form method = "post" action= '' id="signup">
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
            <input type="text" id="password1" name="password1" placeholder="Password123!">
        </div>

        <div>
            <label for="password2">Confirm Password</label>
            <br>
            <input type="text" id="password2" name="password2" placeholder="Confirm Password">
        </div>
    
        <div>
            <br>
            <label for="dob">Date of Birth:</label>
            <select name="dob" id="dob">
              <option value="">Day</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
            <select name="dob_month" id="dob_month">
              <option value="">Month</option>
              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="July">July</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
              <option value="December">December</option>
            </select>
            <select name="dob_year" id="dob_year">
              <option value="">Year</option>
              <option value="1960">1960</option>
              <option value="1961">1961</option>
              <option value="1962">1962</option>
              <option value="1963">1963</option>
              <option value="1964">1964</option>
              <option value="1965">1965</option>
              <option value="1966">1966</option>
              <option value="1967">1967</option>
              <option value="1968">1968</option>
              <option value="1969">1969</option>
              <option value="1970">1970</option>
              <option value="1971">1971</option>
              <option value="1972">1972</option>
              <option value="1973">1973</option>
              <option value="1974">1974</option>
              <option value="1975">1975</option>
              <option value="1976">1976</option>
              <option value="1977">1977</option>
              <option value="1978">1978</option>
              <option value="1979">1979</option>
              <option value="1980">1980</option>
              <option value="1981">1981</option>
              <option value="1982">1982</option>
              <option value="1983">1983</option>
              <option value="1984">1984</option>
              <option value="1985">1985</option>
              <option value="1986">1986</option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
            </select>
            <br>          
        </div>

        <div>
            <br>
            <label for="postal">Postal Code (For Local Weather)</label>
            <br>
            <input type="text" id="postal" name="postal" placeholder="H0H 0H0">
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
        </div>

        <div>
            <label>Gender:</label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label>
            <br>
        </div>
    
        <input type="submit" name="Sign up" value = "mybutton">
    </form>
    <?php
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $preferred = $_POST["pname"];
        $email = $_POST["email"];
        $password = $_POST["password1"];
        $dob = $_POST["dob_year"]  . $_POST["dob_month"]  . $_POST["dob"];    
        $insert_query = "INSERT INTO users (firstname, lastname, preferred, email, password, dob)
        VALUES ('$firstname', '$lastname', '$preferred', '$email', '$password', '$dob')";
    
        if ($conn->query($insert_query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }
    $conn->close();
    ?>
    
    <script>
        // Get the radio button and text input elements
        var referredBy = document.getElementById("other"); // Multiple choice style selection
        var referredByOther = document.getElementById("other-input"); // Text based answer
    

        
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

        // Will use if we are allowed to use mandatory/required attributes

        /*function validateForm() {
            var form = document.getElementById("signup"); // Get form. Set it to var form
            var inputs = form.getElementsByTagName("input"); // Get all input fields

            for (var i = 0; i < inputs.length; i++) 
            {
                if (inputs[i].hasAttribute("required") && inputs[i].value == "") 
                {
                alert("Please fill out all required fields.");
                return false;
                }
            }

            return true;
        }*/

        function validateForm() 
        {
            var form = document.getElementById("signup"); // Get form. Set it to var form
            var inputs = form.getElementsByTagName("input"); // Get all input fields

            for (var i = 0; i < inputs.length; i++) // increment through the text boxes. (looking for characters)
            {
                if (inputs[i].type == "text" && inputs[i].value == "") // If a textbox contains nothing, remind the user to fill it out
                {
                alert("Please fill out all text boxes.");
                }
            }
            return true;
        }
        

    </script>
    <?php include ('footer.php'); ?>
</body>
</html>
