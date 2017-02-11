<?php

namespace GeoIp;

require_once __DIR__ . '/../vendor/autoload.php';

use GeoIp2\Database\Reader;

class Main 
{
    /**
    *   Return the geo information.
    */
    public function Run(){
        $urlParts = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $reader = new Reader(__DIR__ . '/../data/GeoLite2-City.mmdb');

        $ip = $this->GetIpAddressFromUrl($urlParts);
        $result = $reader->city($ip);
        
        return $result;
    }

    /**
    *   Returns the ip address contained in the url.
    */
    protected function GetIpAddressFromUrl($urlParts){
        foreach($urlParts as $part){
            if(filter_var($part, FILTER_VALIDATE_IP)){
                return $part;
            }
        }
    }
}

?>