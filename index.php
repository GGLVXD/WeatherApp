<?php
include 'data.php';
include 'country.php';

//debuging
error_reporting(E_ALL);
ini_set('display_errors', 1);


//laika zona
date_default_timezone_set("Europe/Riga");

// Piemēri, kā piekļūt:
$cityName = $forecast["city"]["name"];
$valsts = $forecast["city"]["country"];
$firstDayMax = $forecast["list"][0]["temp"]["max"];
$firstDayDesc = $forecast["list"][0]["weather"][0]["description"];

// funkcijas kas dabu valsti no valsts koda,  wow loti universiali
function valsts($valstskods, $countryarray) {
  return $countryarray[$valstskods];
}

$fuck = $country['LV'];
$wind = $forecast["list"][0]["speed"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/weather.css">
    <link rel="stylesheet" href="css/future.css">
    <link rel="stylesheet" href="css/current.css">
    <link rel="stylesheet"  href="css/minibox.css">
    <script src="js/tabs.js"> </script>
</head>
<body>
  <!-- Header -->
<div class="container-header shadow p-3 mb-5 bg-body-tertiary rounded">
  <div  class="title"><h1>  <i class="fa fa-bars hamburger-icon"></i> VTDT Sky </h1></div>
  <div class="pilseta"><p> <?php echo $cityName ?>, <?php echo valsts($forecast["city"]["country"], $country) ?></p> </div>

    <!-- search -->
    <div class="nav-info my-2 my-lg-0">
        <!-- input field -->
        <div  class="form-control search">
            <input class="input" type="search" name="" placeholder="Search Location" id="">
            <!-- world icon -->
            <img class="search-icon" src="https://forecast-app-vtdt.vercel.app/images/worldwide.gif">
        </div>
        <!-- submit poga -->
        <div class="theme-switcher-box">
        <button class="nav-info-button btn button" type="submit"><i class="fa-solid fa-sun"></i>Light</button>
        </div>
    </div>
    <div class="buttons-nav">
        <img src="https://forecast-app-vtdt.vercel.app/images/notification.gif" alt="gear" class="buttons-nav-img">
        <img src="https://forecast-app-vtdt.vercel.app/images/settings.gif" alt="gear" class="buttons-nav-img">
    </div>
</div>


<!-- pasi weather elementi -->
<div class="weather">
    <!-- weather boxes -->
  <div class="current shadow p-3 mb-5 bg-body-tertiary rounded">
  <p class="current-weather">Current Weather</p>
  <p class="overcast"> Overcast <br> Feels Like </p>
  <p class="localtime">Local time: <?php echo date('h:i A');?></p>
  <p> <?php echo $firstDayMax ?>&#8451</p>
  <p>Current wind direction: N/A </p>
  </div>


<div class="air-quality shadow p-3 mb-5 bg-body-tertiary rounded">
    <img src="https://forecast-app-vtdt.vercel.app/images/clouds.gif" width="25px">
  Air Quality <br>
    <h2 class="minibox-h2-text">ee</h2>
</div>

<div class="wind shadow p-3 mb-5 bg-body-tertiary rounded">
  Wind
    <!-- uses h3 jo es deadass size nevaru nomainit -->
    <h3 class="minibox-h2-text"><?php echo $wind ?> km/h</h3>
</div>

<div class="humidity shadow p-3 mb-5 bg-body-tertiary rounded">
    Humidity <br>
    <h2 class="minibox-h2-text" >e</h2>
</div>

<div class="visibility shadow p-3 mb-5 bg-body-tertiary rounded">
  visibility
</div>

<div class="pressure shadow p-3 mb-5 bg-body-tertiary rounded">
  pressure
</div>

<div class="pressure2 shadow p-3 mb-5 bg-body-tertiary rounded">
  pressure2
</div>




<div class="future shadow p-3 mb-5 bg-body-tertiary rounded">
  <!--https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_tabulators -->
  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button button-switcher" onclick="openTab('Today')">Today</button>
    <button class="w3-bar-item w3-button button-switcher" onclick="openTab('Tomorrow')">Tomorrow</button>
    <button class="button-switcher" onclick="openTab('10 Days')">10 Days</button>
  </div>
<div id="Today" class="w3-container city">
    <div class="laiks1 weather-box">
        <h2 class="time">Day</h2>
        <p class="temperature"><?php echo $forecast["list"][0]["temp"]["day"]?></p>
    </div>
    <div class="laiks1 weather-box">
        <h2 class="time">Night</h2>
        <p class="temperature"><?php echo $forecast["list"][1]["temp"]["night"]?></p>
    </div>
</div>

<div id="Tomorrow" class="w3-container city " style="display:none">
  <div class="laiks1">
    <h2>London2</h2>
    <p>London is the capital city of England.</p>
</div>
</div>

<div class="summary">
</div>
</div>
time: <?php echo date('H:i:s', $forecast["list"][0]["sunrise"]); ?>
</body>

<script>
function openTab(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>
</html>