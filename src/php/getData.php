<?php
$data = file_get_contents("http://api.weatherapi.com/v1/current.json?key=1f8a5c56a5744e389e741625240111&q=Riga");
$current = json_decode($data, true);

$data = file_get_contents("http://api.weatherapi.com/v1/astronomy.json?key=1f8a5c56a5744e389e741625240111&q=riga");
$astronomy = json_decode($data, true);

$data = file_get_contents("http://api.weatherapi.com/v1/forecast.json?key=1f8a5c56a5744e389e741625240111&q=Riga");
$forecast = json_decode($data, true);
?>