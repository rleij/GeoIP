<?php

require_once __DIR__ . '/src/Main.php';

header("Content-Type: application/json; charset=UTF-8");

$main = new \GeoIp\Main;
$result = $main->Run();

echo json_encode($result);

?>