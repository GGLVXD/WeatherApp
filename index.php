<?php
include 'src/php/data.php';
include 'src/php/country.php';
function countryCodeToName($countrycode, $countryarray) {
  return $countryarray[$countrycode];
}

$cityName= $forecast["city"]["name"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React App1</title>

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <!-- font awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- CSS -->

    <!-- global stuff -->
    <link rel="stylesheet" href="src/css/global.css">
    <!-- header -->
    <link rel="stylesheet" href="src/css/header.css">
    <!-- content -->
    <link rel="stylesheet" href="src/css/content.css">
    <!-- current weather -->
    <link rel="stylesheet" href="src/css/box/current.css">
</head>
<body>
    <!-- header -->
    <header class="header">
        <!-- header container -->
        <div class="header-container shadow p-3 mb-5 bg-white rounded">
            <!-- logo, city stuff -->
            <div class="logo-container"> 
                <!-- logo div -->
                <div class="logo-text-box">
                    <!-- hamburger -->
                    <div class="logo-hamburger">
                        <button class="hamburger">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- logo text -->
                        <h1 class="logo-text">VTDT Sky</h1>
                    </div>
                </div>
                <!-- location box -->
                <div class="header-location">
                    <!-- that maps icon -->
                    <img src="assets/icons/google-maps.gif" alt="worldwide" width="25px" height="25px"> 
                    <!-- location text -->
                    <p class="location-text"><?php echo $cityName; echo ", "; echo countryCodeToName($forecast["city"]["country"], $country)?></p>
                </div>
            </div>
            <!-- search box + theme switcher -->
            <div class="search-theme-box">
                <!-- search box container -->
                <div class="search-container my-2 my-lg-0">
                    <i class="fas fa-search search-icon"></i>
                    <input id="searchInput" type="text" class="search-input" placeholder="Search Location">
                    <!-- worldwide icon -->
                    <div class="worldwide-icon">
                        <button id="button" onclick="getData()" class="worldwide-button">
                            <img src="assets/icons/worldwide.gif" alt="worldwide">
                        </button>
                    </div>
                </div>
                <div class="theme-switcher-container">
                    <button class="theme-switcher-button btn btn-dark">
                        <img src="assets/icons/sun.svg" alt="sun icon" width="20" height="20">
                        Light
                    </button>
                </div>
            </div>
            <!-- notifications and settings container -->
            <div class="notifications-settings-container">
                <img class="notifications-settings-images" alt="notification" src="assets/icons/notification.gif" width="25px" height="30px">
                <img class="notifications-settings-images" alt="settings" src="assets/icons/settings.gif" width="25px" height="30px">
            </div>
        </div>
    </header>

    <content> 
        <!-- main content section -->
        <div class="content-container">
            <!-- current weather box -->
            <div class="current-box shadow p-3 mb-5 bg-white rounded">
                <div class="current-weather-text-box">
                    <p class="current-weather-text">Current Weather</p>
                </div>
                <div class="localtime-box">
                    <h2>Local time: <h2 id="localtime"></h2></h2>
                </div>
            </div>
            <!-- current airquality box -->
            <div class="airquality-box shadow p-3 mb-5 bg-white rounded">
                e
            </div>
            <!-- wind box -->
            <div class="wind-box shadow p-3 mb-5 bg-white rounded">
                e
            </div>
            <!-- humidity box -->
            <div class="humidity-box shadow p-3 mb-5 bg-white rounded">
                e
            </div>
            <!-- visibiliy box -->
            <div class="visibility-box shadow p-3 mb-5 bg-white rounded">
                e
            </div>
            <!-- pressure box -->
            <div class="pressure-box shadow p-3 mb-5 bg-white rounded">
                e
            </div>
            <!-- pressure another box -->
            <div class="pressure2-box shadow p-3 mb-5 bg-white rounded">
                e
            </div>
            <!-- summary box -->
            <div class="summary-box shadow p-3 mb-5 bg-white rounded">
                e
            </div>
            <!-- forecast box -->
            <div class="forecast-box shadow p-3 mb-5 bg-white rounded">
                e
            </div>
        </div>
    </content>
</body>
<script src="src/js/live.js"></script>
<script src="src/js/onenter.js"></script>
<script src="src/js/getdata.js"></script>
<script>
    // execute on load lol (default to Riga)
    getData();
</script>
</html>