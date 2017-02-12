<?php

require_once __DIR__ . '/src/Main.php';

$main = new \GeoIp\Main;
$result = $main->Run();

header("Content-Type: application/json; charset=UTF-8");
echo json_encode([
    'ip_address' => $result->traits->ipAddress,
    'timezone' => $result->location->timeZone,
    'continent' => [
        'geoname_id' => $result->continent->geonameId,
        'iso_code' => $result->continent->code,
        'name' => $result->continent->name
    ],
    'country' => [
        'geoname_id' => $result->country->geonameId,
        'iso_code' => $result->country->isoCode,
        'name' => $result->country->name
    ],
    'city' => [
        'geoname_id' => $result->city->geonameId,
        'name' => $result->city->name
    ],
    'location' => [
        'accuracy' => $result->location->accuracyRadius,
        'latitude' => $result->location->latitude,
        'longitude' => $result->location->longitude
    ]
]);

?>