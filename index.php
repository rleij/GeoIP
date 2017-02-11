<?php

require_once __DIR__ . '/src/Main.php';

header("Content-Type: application/json; charset=UTF-8");
echo json_encode((new \GeoIp\Main)->Run());

?>