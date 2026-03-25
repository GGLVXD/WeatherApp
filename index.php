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
                    <input type="text" class="search-input" placeholder="Search Location">
                    <!-- worldwide icon -->
                    <div class="worldwide-icon">
                        <img src="assets/icons/worldwide.gif" alt="worldwide" width="25px">
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>