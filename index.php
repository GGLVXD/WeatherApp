<?php
include 'src/php/country.php';
include 'src/php/getData.php';
function countryCodeToName($countrycode, $countryarray) {
  return $countryarray[$countrycode];
}

function getHourlyForecastData($forecast, $day = 0) {
    $hours = $forecast["forecast"]["forecastday"][$day]["hour"] ?? [];
    $hourlyData = [];

    foreach ($hours as $hour) {
        $hourlyData[] = [
            "time_epoch" => $hour["time_epoch"] ?? null,
            "icon" => $hour["condition"]["icon"] ?? "",
            "description" => $hour["condition"]["text"] ?? "",
            "temperature" => $hour["temp_c"] ?? null,
            "wind" => $hour["wind_kph"] ?? null,
            "humidity" => $hour["humidity"] ?? null,
        ];
    }

    return $hourlyData;
}

$localtime = $current["location"]["localtime_epoch"]; // localtime in unix
$air_quality = $current["current"]["uv"]; // air quality 
$temp = $current["current"]["temp_c"];
$feelslike = $current["current"]["feelslike_c"]; // feels like temp
$currenticon = $current["current"]["condition"]["icon"]; // icon for the current weather
$wind_direction = $current["current"]["wind_dir"];
$humidity = $current["current"]["humidity"];
$visibility = $current["current"]["vis_km"];
$pressure_in = $current["current"]["pressure_in"];
$pressure_mb = $current["current"]["pressure_mb"];
$wind_speed = $current["current"]["wind_kph"];

$country = $current["location"]["country"];
$city = $current["location"]["region"];
//$cityName= $forecast["city"]["name"];


$sunrise = $astronomy["astronomy"]["astro"]["sunrise"];
$sunset = $astronomy["astronomy"]["astro"]["sunset"];

$moonrise = $astronomy["astronomy"]["astro"]["moonrise"];
$moonset = $astronomy["astronomy"]["astro"]["moonset"];


// forcast

$todayHourlyData = getHourlyForecastData($forecast, 0);
$tomorrowHourlyData = getHourlyForecastData($forecast, 1);



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
    <!-- global box things -->
    <link rel="stylesheet" href="src/css/box/box.css">
    <!-- future forecast box -->
    <link rel="stylesheet" href="src/css/box/future.css">
    <!-- summary -->
    <link rel="stylesheet" href="src/css/box/summary.css">
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
                    <p class="location-text"><?php echo $city; echo ", "; echo $country; ?></p>
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
                    <p>Local time: <?php echo date('H:i A', $localtime);?></p>
                </div>
                <div class="weather-overcast">
                    <img src="http:<?php echo $currenticon?>">
                    <p class="weather-text"><?php echo $temp ?>°C</p>
                    <p>Overcast<br>Feels Like <?php echo $feelslike ?>°C</p>
                </div>
                <div class="wind-direction"> 
                    <p>Current wind direction: <?php echo $wind_direction ?></p>
                </div>
            </div>
            <!-- current airquality box -->
            <div class="airquality-box shadow p-3 mb-5 bg-white rounded">
                <div class="title-box">
                    <img class="box-icon" src="assets/icons/clouds.gif">
                    <p class="title-text-box">Air Quality</p>
                </div>
                <div class="content-box">
                    <p class="content-text"><?php echo $air_quality ?></p>
                </div>
            </div>
            <!-- wind box -->
            <div class="wind-box shadow p-3 mb-5 bg-white rounded">
                <div class="title-box">
                    <img class="box-icon" src="assets/icons/wind.gif">
                    <p class="title-text-box">Wind</p>
                </div>
                <div class="content-box">
                    <p class="content-text"><?php echo $wind_speed ?> km/h</p>
                </div>
            </div>
            <!-- humidity box -->
            <div class="humidity-box shadow p-3 mb-5 bg-white rounded">
                <div class="title-box">
                    <img class="box-icon" src="assets/icons/humidity.gif">
                    <p class="title-text-box">Humidity</p>
                </div>
                <div class="content-box">
                    <p class="content-text"><?php echo $humidity ?>%</p>
                </div>
            </div>
            <!-- visibiliy box -->
            <div class="visibility-box shadow p-3 mb-5 bg-white rounded">
                <div class="title-box">
                    <img class="box-icon" src="assets/icons/vision.gif">
                    <p class="title-text-box">Visibility</p>
                </div>
                <div class="content-box">
                    <p class="content-text"><?php echo $visibility ?>km</p>
                </div>
            </div>
            <!-- pressure in box -->
            <div class="pressure-box shadow p-3 mb-5 bg-white rounded">
                <div class="title-box">
                    <img class="box-icon" src="assets/icons/air-pump.gif">
                    <p class="title-text-box">Pressure</p>
                </div>
                <div class="content-box">
                    <p class="content-text"><?php echo $pressure_in ?> in</p>
                </div>
            </div>
            <!-- pressure another box -->
            <div class="pressure2-box shadow p-3 mb-5 bg-white rounded">
                <div class="title-box">
                    <img class="box-icon" src="assets/icons/air-pump.gif">
                    <p class="title-text-box">Pressure</p>
                </div>
                <div class="content-box">
                    <p class="content-text"><?php echo $pressure_mb ?>°</p>
                </div>
            </div>
            <!-- summary box -->
            <div class="summary-box shadow p-3 mb-5 bg-white rounded">
                <div class="summary-text-container">
                    <p class="summary-text">Sun & Moon Summary</p>
                </div>
                <div class="day-air-qualitaty-summary-container">
                    <img class="summary-image" src="assets/icons/moon.gif" alt="sun icon">
                    <!-- couldnt find air quality -->
                    <div class="air-quality-container">
                        <div class="air-quality-text">
                            <p class="air-qualitaty-summary">Air Quality</p>
                        </div>
                        <div class="air-quality-var">
                            <p><?php echo $air_quality?></p>
                        </div>
                    </div>
                </div>
                <div class="night-air-qualitaty-summary-container">
                    <img class="summary-image" src="assets/icons/sun.gif" alt="sun icon">
                    <div class="air-quality-container">
                        <div class="air-quality-text">
                            <p class="air-qualitaty-summary">Air Quality</p>
                        </div>
                        <div class="air-quality-var">
                            <p><?php echo $air_quality?></p>
                        </div>
                    </div>
                    <div class="sunrise-container">
                        <div class="sunrise-icon">
                            <img class="sunrise-icon-image" src="assets/icons/field.gif" alt="sunrise icon">
                        </div>
                        <div class="sunrise-text-container">
                            <p class="sunrise">sunrise</p> 
                        </div>
                        <div class="sunrise-var-container">
                        <p class="sunrise-var"><?php echo $sunrise ?></p><br>
                        </div>
                    </div>
                    <div class="sunset-container">
                        <div class="sunset-icon">
                            <img class="sunset-icon-image" src="assets/icons/sunset.gif" alt="sunset icon">
                        </div>
                        <div class="sunset-text-container">
                            <p class="sunset">sunset</p>
                        </div>
                        <div class="sunset-var-container">
                        <p class="sunset-var"><?php echo $sunset ?></p>
                        </div>
                    </div>
                </div>
            <div class="moon-summary-container">
                <div class="moonrise-container">
                    <div class="moonrise-image-container">
                        <img class="moonrise-icon-image" src="assets/icons/moon-rise.gif" alt="moonrise icon">
                    </div>
                    <div class="moonrise-text-container">
                        <p class="moonrise">Moonrise</p>
                    </div>
                    <div class="moonrise-var-container">
                        <p class="moonrise-var"><?php echo $moonrise ?></p>
                    </div>
                </div>
                <div class="moonset-container">
                    <div class="moonset-image-container">
                        <img class="moonrise-icon-image" src="assets/icons/moon-set.gif" alt="moonset icon">
                    </div>
                    <div class="moonset-text-container">
                        <p class="moonrise">Moonset</p>
                    </div>
                    <div class="moonset-var-container">
                        <p class="moonrise-var"><?php echo $moonset ?></p>
                    </div>
                </div>
            </div>
            </div>
            <!-- forecast box -->
            <div class="forecast-box shadow p-3 mb-5 bg-white rounded">
                <div class="w3-bar w3-black tabs">
                    <button class="w3-bar-item w3-button button-switcher" onclick="openTab('Today')">Today</button>
                </div>
                <div id="Today" class="w3-container city">
                    <?php
                        $h00Icon = $todayHourlyData[0]["icon"];
                        $h03Icon = $todayHourlyData[3]["icon"];
                        $h06Icon = $todayHourlyData[6]["icon"];
                        $h09Icon = $todayHourlyData[9]["icon"];
                        $h12Icon = $todayHourlyData[12]["icon"];
                        $h15Icon = $todayHourlyData[15]["icon"];
                        $h18Icon = $todayHourlyData[18]["icon"];
                        $h21Icon = $todayHourlyData[21]["icon"];

                        $h00Time = date('H:i A', $todayHourlyData[0]["time_epoch"]);
                        $h03Time = date('H:i A', $todayHourlyData[3]["time_epoch"]);
                        $h06Time = date('H:i A', $todayHourlyData[6]["time_epoch"]);
                        $h09Time = date('H:i A', $todayHourlyData[9]["time_epoch"]);
                        $h12Time = date('H:i A', $todayHourlyData[12]["time_epoch"]);
                        $h15Time = date('H:i A', $todayHourlyData[15]["time_epoch"]);
                        $h18Time = date('H:i A', $todayHourlyData[18]["time_epoch"]);
                        $h21Time = date('H:i A', $todayHourlyData[21]["time_epoch"]);

                        $h00Description = $todayHourlyData[0]["description"];
                        $h03Description = $todayHourlyData[3]["description"];
                        $h06Description = $todayHourlyData[6]["description"];
                        $h09Description = $todayHourlyData[9]["description"];
                        $h12Description = $todayHourlyData[12]["description"];
                        $h15Description = $todayHourlyData[15]["description"];
                        $h18Description = $todayHourlyData[18]["description"];
                        $h21Description = $todayHourlyData[21]["description"];

                        $h00Temp = $todayHourlyData[0]["temperature"];
                        $h03Temp = $todayHourlyData[3]["temperature"];
                        $h06Temp = $todayHourlyData[6]["temperature"];
                        $h09Temp = $todayHourlyData[9]["temperature"];
                        $h12Temp = $todayHourlyData[12]["temperature"];
                        $h15Temp = $todayHourlyData[15]["temperature"];
                        $h18Temp = $todayHourlyData[18]["temperature"];
                        $h21Temp = $todayHourlyData[21]["temperature"];
                    ?>
                    <div class="laiks1 weather-box">
                        <img class="forecast-icon" src="https:<?php echo $h00Icon; ?>">
                            <div class="time-description">
                            <p class="time"><?php echo $h00Time; ?></p>
                            <p class="forecast-description"> <?php echo $h00Description; ?></p>
                        </div>
                            <p class="temperature"> <?php echo $h00Temp . "°C"; ?></p>
                    </div>
                    <div class="laiks1 weather-box">
                        <img class="forecast-icon" src="https:<?php echo $h03Icon; ?>">
                            <div class="time-description">
                            <p class="time"><?php echo $h03Time; ?></p>
                            <p class="forecast-description"> <?php echo $h03Description; ?></p>
                        </div>
                            <p class="temperature"> <?php echo $h03Temp . "°C"; ?></p>
                    </div>
                    <div class="laiks1 weather-box">
                        <img class="forecast-icon" src="https:<?php echo $h06Icon; ?>">
                            <div class="time-description">
                            <p class="time"><?php echo $h06Time; ?></p>
                            <p class="forecast-description"> <?php echo $h06Description; ?></p>
                        </div>
                            <p class="temperature"> <?php echo $h06Temp . "°C"; ?></p>
                    </div>
                    <div class="laiks1 weather-box">
                        <img class="forecast-icon" src="https:<?php echo $h09Icon; ?>">
                            <div class="time-description">
                            <p class="time"><?php echo $h09Time; ?></p>
                            <p class="forecast-description"> <?php echo $h09Description; ?></p>
                        </div>
                            <p class="temperature"> <?php echo $h09Temp . "°C"; ?></p>
                    </div>
                    <div class="laiks1 weather-box">
                        <img class="forecast-icon" src="https:<?php echo $h12Icon; ?>">
                            <div class="time-description">
                            <p class="time"><?php echo $h12Time; ?></p>
                            <p class="forecast-description"> <?php echo $h12Description; ?></p>
                        </div>
                            <p class="temperature"> <?php echo $h12Temp . "°C"; ?></p>
                    </div>
                    <div class="laiks1 weather-box">
                        <img class="forecast-icon" src="https:<?php echo $h15Icon; ?>">
                            <div class="time-description">
                            <p class="time"><?php echo $h15Time; ?></p>
                            <p class="forecast-description"> <?php echo $h15Description; ?></p>
                        </div>
                            <p class="temperature"> <?php echo $h15Temp . "°C"; ?></p>
                    </div>
                    <div class="laiks1 weather-box">
                        <img class="forecast-icon" src="https:<?php echo $h18Icon; ?>">
                            <div class="time-description">
                            <p class="time"><?php echo $h18Time; ?></p>
                            <p class="forecast-description"> <?php echo $h18Description; ?></p>
                        </div>
                            <p class="temperature"> <?php echo $h18Temp . "°C"; ?></p>
                    </div>
                    <div class="laiks1 weather-box">
                        <img class="forecast-icon" src="https:<?php echo $h21Icon; ?>">
                            <div class="time-description">
                            <p class="time"><?php echo $h21Time; ?></p>
                            <p class="forecast-description"> <?php echo $h21Description; ?></p>
                        </div>
                            <p class="temperature"> <?php echo $h21Temp . "°C"; ?></p>
                    </div>
                </div>

    </content>
</body>
<script src="src/js/live.js"></script>
<script src="src/js/onenter.js"></script>
<script src="src/js/tabs.js"></script>
</html>