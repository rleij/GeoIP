<?php

namespace GeoIp;

class CountryInfo
{
    /**
    *   Return all country information for the visitors ip.
    */
    function Get($alpha2) {
        ini_set('auto_detect_line_endings', true);

        $path = realpath(__DIR__ . '/..');
        $file = $path . '/data/countryInfo.txt';

        $fh = fopen($file, 'r');
       
        while (($line = fgetcsv($fh, 400, "\t")) !== false) {
            // skip comment lines
            if($line[0][0] !== '#') {
                if($line[0] === $alpha2){
                    return [
                        'iso' => [ // iso 3166-1
                            'alpha2' => $line[0],
                            'alpha3' => $line[1],
                            'numeric' => $line[2]
                        ],
                        'fips' => $line[3], // fips 10-4
                        'country' => $line[4],
                        'capital' => $line[5],
                        'surface_km2' => (int)$line[6], // in km2
                        'population' => (int)$line[7],
                        'languages' => explode(',', $line[15]),
                        'neighbours' => explode(',', $line[17]),
                        'currency' => [
                            'code' => $line[10], // iso 4217
                            'name' => $line[11]
                        ],
                        'postal' => [
                            'format' => $line[13],
                            'regex' => $line[14]
                        ],
                        'phone' => $line[12],
                        'tld' => $line[9]
                    ];
                }
            }
        }
    }
}

?>