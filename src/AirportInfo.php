<?php

namespace GeoIp;

class AirportInfo
{
    /**
    *   Return all airports for the visitors country.
    */
    function Get($alpha2) {
        ini_set('auto_detect_line_endings', true);

        $path = realpath(__DIR__ . '/..');
        $file = $path . '/data/airport-codes.csv';

        $fh = fopen($file, 'r');
        $i = 0;
        
        $small = array();
        $medium = array();
        $large = array();

        while (($line = fgetcsv($fh, 50000, ",")) !== false) {
            if($i !== 0) {
                if($line[7] === $alpha2){
                    $airport = [
                        'identifier' => $line[0],
                        'name' => $line[2],
                        'latitude' => $line[3],
                        'longitude' => $line[4],
                        'elevation_ft' => $line[5]
                    ];

                    if($line[1] === 'small_airport'){
                        $small[] = $airport;
                    } else if($line[1] === 'medium_airport'){
                        $medium[] = $airport;
                    } else if($line[1] === 'large_airport'){
                        $large[] = $airport;
                    }
                }
            }

            $i++;
        }

        return [
            'large_airports' => $large,
            'medium_airports' => $medium,
            'small_airports' => $small
        ];
    }
}

?>