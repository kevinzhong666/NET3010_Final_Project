<?php 
session_start(); // start the session 
// check if the user clicked the logout button
if (isset($_POST['logout'])) 
{
    // destroy the session and unset session variables
    session_unset();
    session_destroy();

    // redirect to the home page
    header('Location: index.php');
    exit();
}
?>

<?php include("head.php"); ?>
<body>
  <div class="wrapper">
  <?php include("header.php"); ?>
    <?php include("nav.php"); ?>

    <section id="loggedIn">
        <?php if (isset($_SESSION['username'])): ?>
            <h3>Welcome, <?php echo $_SESSION['username']; ?>!</h3>

            <form method="post" action="">
                <input type="submit" name="logout" value="Log out">
            </form> 

        <?php else: ?>
            <h2>Welcome to our website!</h2>
            <p>Please <a href="login.php">log in</a> to access your account.</p>
        <?php endif; ?>

    <h1>Your Weather, John.</h1>

    <div class="container-wrapper">
      <div class="container">
        <div class="search-bar">
          <i class="fa-solid fa-location-dot"></i>
          <input type="text" placeholder="Enter your location" />
          <button class="fa-solid fa-magnifying-glass"></button>
        </div>

        <div class="not-found">
          <img src="images/404.png" />
          <p>Location is not available</p>
        </div>

        <div class="weather-info">
          <img src="" />
          <p class="temperature"></p>
          <p class="description"></p>
        </div>

        <div class="weather-details">
          <div class="humidity">
            <i class="fa-solid fa-water"></i>
            <div class="text">
              <span></span>
              <p>Humidity</p>
            </div>
          </div>
          <div class="wind">
            <i class="fa-solid fa-wind"></i>
            <div class="text">
              <span></span>
              <p>Wind Speed</p>
              <script
                src="https://kit.fontawesome.com/7c8801c017.js"
                crossorigin="anonymous"
              ></script>
              <script src="index.js"></script>
              <?php include ('footer.php'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://kit.fontawesome.com/7c8801c017.js"
      crossorigin="anonymous"
    ></script>
    <script src="index.js"></script>
    <?php include ('footer.php'); ?>
    <div class="ad-column-left"></div>

    <div class="ad-column-right"></div>
  </div>
  </body>
</html>
