<?php 
session_start(); // start the session 
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
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
<body onload="displayRandomQuote()">

  <div class="wrapper">
  <?php include("header.php"); ?>
    <?php include("nav.php"); ?>

    <section id="loggedIn">
        <?php if (isset($_SESSION['username'])): ?>
            <form method="post" action="">
                <input type="submit" name="logout" value="Log out">
            </form> 

        <?php else: ?>
            <h2>Welcome to our website!</h2>
            <p>Please <a href="loginpage.php">log in</a> to access your account.</p>
        <?php endif; ?>

    <h1>Your Weather, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; ?>.</h1>

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
            </div>
          </div>
        </div>
      </div>
    </div>
    <p id="quote"></p>
    <p id="author"></p>

    <script src="quotes.js"></script>
    <?php if ($loggedIn): ?>
      <script>
          function displayRandomQuote() 
          {
              const quotesArray = <?php echo json_encode($quotes['quotes']); ?>;
              const randomIndex = <?php echo rand(0, count($quotes['quotes']) - 1); ?>;
              const quote = quotesArray[randomIndex].quote;
              const author = quotesArray[randomIndex].author;
              document.getElementById('quote').innerHTML = '"' + quote + '"';
              document.getElementById('author').innerHTML = '- ' + author;
          }
      </script>
    <?php endif; ?>


    <script
      src="https://kit.fontawesome.com/7c8801c017.js"
      crossorigin="anonymous"
    ></script>
    <script src="index.js"></script>
     

    <?php include ('footer.php'); ?>
    <?php if (!$loggedIn): ?>
      <div class="ad-column-left"></div>
    <?php endif;?>

    <?php if (!$loggedIn): ?>
      <div class="ad-column-right"></div>
    <?php endif;?>
  </div>
  </body>
</html>