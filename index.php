<?php

require_once __DIR__ . '/src/Main.php';
require_once __DIR__ . '/src/CountryInfo.php';
require_once __DIR__ . '/src/AirportInfo.php';

$main = new \GeoIp\Main;
$result = $main->Run();

header("Content-Type: application/json; charset=UTF-8");

echo json_encode([
    'ip_address' => $result->traits->ipAddress,
    'timezone' => $result->location->timeZone,
    'continent' => [
        'code' => $result->continent->code,
        'name' => $result->continent->name
    ],
    'country' => (new \GeoIp\CountryInfo)->Get($result->country->isoCode),
    'city' => [
        'name' => $result->city->name
    ],
    'location' => [
        'accuracy' => $result->location->accuracyRadius,
        'latitude' => $result->location->latitude,
        'longitude' => $result->location->longitude
    ],
    'airports' => (new \GeoIp\AirportInfo)->Get($result->country->isoCode)
], JSON_PRETTY_PRINT);

?>