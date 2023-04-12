<?php

use Geocoder\Provider\Chain\Chain;
use Geocoder\Provider\GeoPlugin\GeoPlugin;
use Geocoder\Provider\GoogleMaps\GoogleMaps;
use Http\Client\Curl\Client;

return [
    'cache-duration' => 0,
    'providers' => [
        Chain::class => [
            GoogleMaps::class => [
                env('en', 'en-US'), //YOU HAD ONLY 'en-US' here.
                env('GOOGLE_MAPS_API_KEY'),
            ],
        ],
        GoogleMaps::class => [
            env('en', 'en-US'), //YOU HAD ONLY 'us' here.
            env('GOOGLE_MAPS_API_KEY'),
        ],
    ],
    'adapter'  => Client::class,
];
