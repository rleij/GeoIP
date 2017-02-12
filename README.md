# PHP-GeoIP
Lookup information on an ip address, using maxmind and geonames data.

# Example
http://pi.lan/geoip/8.8.8.8

# Result
```json
{
    "ip_address": "8.8.8.8",
    "timezone": "America\/Los_Angeles",
    "continent": {
        "code": "NA",
        "name": "North America"
    },
    "country": {
        "iso": {
            "alpha2": "US",
            "alpha3": "USA",
            "numeric": "840"
        },
        "fips": "US",
        "country": "United States",
        "capital": "Washington",
        "surface": 9629091,
        "population": 310232863,
        "continent": "NA",
        "languages": [
            "en-US",
            "es-US",
            "haw",
            "fr"
        ],
        "neighbours": [
            "CA",
            "MX",
            "CU"
        ],
        "currency": {
            "code": "USD",
            "name": "Dollar"
        },
        "postal": {
            "format": "#####-####",
            "regex": "^\\d{5}(-\\d{4})?$"
        },
        "phone": "1",
        "tld": ".us"
    },
    "city": {
        "name": "Mountain View"
    },
    "location": {
        "accuracy": 1000,
        "latitude": 37.386,
        "longitude": -122.0838
    }
}
```