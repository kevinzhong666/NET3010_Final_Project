<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name = "date" content = "2023-03-28">
    <title>Login</title>
  </head>

<header>
<div style="height: 200px; width: 100%;">
    <img src="cloudBanner.jpg" alt="Banner Image" style="width:100%; height: 100%;">
</div>

<h1 class="text">Weather Hub</h1>

<h2 class="text">Login</h2>
</header>
<nav>
    <ul>
        <li><a href="#aboutus">About Us</a></li>
        <li class="dropdown">
            <a href="index.html">Weather</a>
            <div class="dropdown-content">
                <a href="index.html#result">Hourly</a>
                <a href="index.html#result">12 Hours</a>
                <a href="index.html#result">Next 14 Days*</a>
                <a href="index.html#location">Find my Location</a>
            </div>
        </li>
        <li><a href="underconstruction.html">Unique Quotes*</a></li>
        <li><a href="underconstruction.html">Horoscopes*</a></li>
        <li><a href="https://cbc.ca/news">News*</a></li>
        <li class="dropdown">
            <a href="#">Account</a>
            <div class="dropdown-content">
                <a href="login.html">Login</a>
                <a href="signup.html">Sign Up</a>
                <a href="login.html">Administration</a>
            </div>
        </li>
    </ul>
</nav>
<body>
    <h2>Sign in to your Weather Hub Account</h2>

    <form id="signup" onsubmit="return validateForm()">
        <div>
            <label for="email">Email Address</label>
            <br>
            <input type="email" id="email" name="email" placeholder="Email/UserName">
        </div>
    
        <div>
            <label for="password">Password</label>
            <br>
            <input type="text" id="password" name="password" placeholder="Password">
        </div>
    <!-- connect the php database here -->
        <button type="submit"> <?php
        ?></button> 
    </form>
    
</body>
<script>
    function validateForm() 
        {
            var form = document.getElementById("signup"); // Get form. Set it to var form
            var inputs = form.getElementsByTagName("input"); // Get text input. Set it to var input

            for (var i = 0; i < inputs.length; i++) // increment through the text boxes. (looking for characters)
            {
                if (inputs[i].type == "text" && inputs[i].value == "") // If a textbox contains nothing
                {
                alert("Please fill out all text boxes.");
                return false;
                }
            }

            return true;
        }
</script>
<footer>
    <h4 class="disclaimer">Disclaimer</h4>
    <p class="disclaimer">
        Disclaimer: The images contained on this webpage are not owned or licensed by the owners of this website. They are provided solely for informational and demonstration purposes and are intended to showcase the weather. 
        The owner of this website makes no claim to the ownership or legality of these images and will remove any content upon request by the rightful owner.
    </p>
    <p>Copyright © 2023 Weather Hub</p>
  </footer>
</html>