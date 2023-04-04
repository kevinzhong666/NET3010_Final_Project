<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel="navbar_stylesheet" href="navbar.css" />
    <title>Weather Hub</title>
  </head>

  <body>
  <div class="wrapper">
  <?php include ('header.php'); ?>

  <?php include ('nav.php'); ?>

    <h1> Your Weather, John.</h1>

    <div class="container-wrapper">
      <div class="container">
        <div class="search-box">
          <i class="fa-solid fa-location-dot"></i>
          <input type="text" placeholder="Enter your location" />
          <button class="fa-solid fa-magnifying-glass"></button>
        </div>

        <div class="not-found">
          <img src="images/404.png" />
          <p>Oops! Invalid location :/</p>
        </div>

        <div class="weather-box">
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
