<?php include ('head.php'); ?>

<body>
<?php include ('header.php'); ?>
<?php include ('nav.php'); ?>
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
        <br>
        <button type="submit"> <?php
        ?>Login</button> 
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
<?php include ('footer.php'); ?>
</html>
