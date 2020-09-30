<?php
function redirectTo($location)
{
  header("Location:" . $location);
  exit;
}

function getCurrentTimeIAmericaChicagoFormat()
{
  date_default_timezone_set("America/Chicago");
  $currentTime = time();
  // $dateTime = strftime("%Y-%m-%d %H:%M:%S", $currentTime);
  $dateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

  return $dateTime;
}

function limitDisplayName($name, $limit, $lowerBound, $upperBound)
{
  if (strlen($name) > $limit) {
    $name = substr($name, $lowerBound, $upperBound) . '..';
  }
  return $name;
}
