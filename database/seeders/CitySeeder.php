<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            // United States
            ['country' => 'US', 'name' => 'New York',       'state' => 'New York',        'latitude' => 40.7127753,  'longitude' => -74.0059728],
            ['country' => 'US', 'name' => 'Los Angeles',    'state' => 'California',      'latitude' => 34.0522342,  'longitude' => -118.2436849],
            ['country' => 'US', 'name' => 'Chicago',        'state' => 'Illinois',        'latitude' => 41.8781136,  'longitude' => -87.6297982],

            // United Kingdom
            ['country' => 'GB', 'name' => 'London',         'state' => 'England',         'latitude' => 51.5072178,  'longitude' => -0.1275862],
            ['country' => 'GB', 'name' => 'Manchester',     'state' => 'England',         'latitude' => 53.4807593,  'longitude' => -2.2426305],
            ['country' => 'GB', 'name' => 'Birmingham',     'state' => 'England',         'latitude' => 52.4862,     'longitude' => -1.8904],

            // Germany
            ['country' => 'DE', 'name' => 'Berlin',         'state' => 'Berlin',          'latitude' => 52.5200066,  'longitude' => 13.404954],
            ['country' => 'DE', 'name' => 'Munich',         'state' => 'Bavaria',         'latitude' => 48.1351253,  'longitude' => 11.5819805],
            ['country' => 'DE', 'name' => 'Hamburg',        'state' => 'Hamburg',         'latitude' => 53.5510846,  'longitude' => 9.9936818],

            // France
            ['country' => 'FR', 'name' => 'Paris',          'state' => 'Île-de-France',   'latitude' => 48.856614,   'longitude' => 2.3522219],
            ['country' => 'FR', 'name' => 'Marseille',      'state' => "Provence-Alpes-Côte d'Azur", 'latitude' => 43.296482, 'longitude' => 5.36978],
            ['country' => 'FR', 'name' => 'Lyon',           'state' => 'Auvergne-Rhône-Alpes', 'latitude' => 45.764043, 'longitude' => 4.835659],

            // Japan
            ['country' => 'JP', 'name' => 'Tokyo',          'state' => 'Tokyo',           'latitude' => 35.6761919,  'longitude' => 139.6503106],
            ['country' => 'JP', 'name' => 'Osaka',          'state' => 'Osaka',           'latitude' => 34.6937249,  'longitude' => 135.5022535],
            ['country' => 'JP', 'name' => 'Kyoto',          'state' => 'Kyoto',           'latitude' => 35.0116363,  'longitude' => 135.7680294],

            // China
            ['country' => 'CN', 'name' => 'Beijing',        'state' => 'Beijing',         'latitude' => 39.9041999,  'longitude' => 116.4073963],
            ['country' => 'CN', 'name' => 'Shanghai',       'state' => 'Shanghai',        'latitude' => 31.2303904,  'longitude' => 121.4737021],
            ['country' => 'CN', 'name' => 'Guangzhou',      'state' => 'Guangdong',       'latitude' => 23.12911,    'longitude' => 113.264385],

            // India
            ['country' => 'IN', 'name' => 'Mumbai',         'state' => 'Maharashtra',     'latitude' => 19.0759837,  'longitude' => 72.8776559],
            ['country' => 'IN', 'name' => 'Delhi',          'state' => 'Delhi',           'latitude' => 28.7040592,  'longitude' => 77.1024902],
            ['country' => 'IN', 'name' => 'Bangalore',      'state' => 'Karnataka',       'latitude' => 12.9715987,  'longitude' => 77.5945627],

            // Brazil
            ['country' => 'BR', 'name' => 'São Paulo',      'state' => 'São Paulo',       'latitude' => -23.5505199, 'longitude' => -46.6333094],
            ['country' => 'BR', 'name' => 'Rio de Janeiro', 'state' => 'Rio de Janeiro',  'latitude' => -22.9068467, 'longitude' => -43.1728965],
            ['country' => 'BR', 'name' => 'Brasília',       'state' => 'Federal District','latitude' => -15.826691,  'longitude' => -47.9218204],

            // Canada
            ['country' => 'CA', 'name' => 'Toronto',        'state' => 'Ontario',         'latitude' => 43.653226,   'longitude' => -79.3831843],
            ['country' => 'CA', 'name' => 'Vancouver',      'state' => 'British Columbia','latitude' => 49.2827291,  'longitude' => -123.1207375],
            ['country' => 'CA', 'name' => 'Montreal',       'state' => 'Quebec',          'latitude' => 45.5016889,  'longitude' => -73.567256],

            // Australia
            ['country' => 'AU', 'name' => 'Sydney',         'state' => 'New South Wales', 'latitude' => -33.8688197, 'longitude' => 151.2092955],
            ['country' => 'AU', 'name' => 'Melbourne',      'state' => 'Victoria',        'latitude' => -37.8136276, 'longitude' => 144.9630576],
            ['country' => 'AU', 'name' => 'Brisbane',       'state' => 'Queensland',      'latitude' => -27.4697707, 'longitude' => 153.0251235],

            // Mexico
            ['country' => 'MX', 'name' => 'Mexico City',    'state' => 'Mexico City',     'latitude' => 19.4326077,  'longitude' => -99.133208],
            ['country' => 'MX', 'name' => 'Guadalajara',    'state' => 'Jalisco',         'latitude' => 20.6596988,  'longitude' => -103.3496092],
            ['country' => 'MX', 'name' => 'Monterrey',      'state' => 'Nuevo León',      'latitude' => 25.6866142,  'longitude' => -100.3161126],

            // South Korea
            ['country' => 'KR', 'name' => 'Seoul',          'state' => 'Seoul',           'latitude' => 37.566535,   'longitude' => 126.9779692],
            ['country' => 'KR', 'name' => 'Busan',          'state' => 'Busan',           'latitude' => 35.1795543,  'longitude' => 129.0756416],
            ['country' => 'KR', 'name' => 'Incheon',        'state' => 'Incheon',         'latitude' => 37.4562557,  'longitude' => 126.7052062],

            // Italy
            ['country' => 'IT', 'name' => 'Rome',           'state' => 'Lazio',           'latitude' => 41.9027835,  'longitude' => 12.4963655],
            ['country' => 'IT', 'name' => 'Milan',          'state' => 'Lombardy',        'latitude' => 45.4642035,  'longitude' => 9.189982],
            ['country' => 'IT', 'name' => 'Naples',         'state' => 'Campania',        'latitude' => 40.8517983,  'longitude' => 14.2681244],

            // Spain
            ['country' => 'ES', 'name' => 'Madrid',         'state' => 'Madrid',          'latitude' => 40.4167754,  'longitude' => -3.7037902],
            ['country' => 'ES', 'name' => 'Barcelona',      'state' => 'Catalonia',       'latitude' => 41.3850639,  'longitude' => 2.1734035],
            ['country' => 'ES', 'name' => 'Valencia',       'state' => 'Valencia',        'latitude' => 39.4699075,  'longitude' => -0.3762881],

            // Netherlands
            ['country' => 'NL', 'name' => 'Amsterdam',      'state' => 'North Holland',   'latitude' => 52.3675734,  'longitude' => 4.9041389],
            ['country' => 'NL', 'name' => 'Rotterdam',      'state' => 'South Holland',   'latitude' => 51.9244201,  'longitude' => 4.4777325],
            ['country' => 'NL', 'name' => 'The Hague',      'state' => 'South Holland',   'latitude' => 52.0704978,  'longitude' => 4.3006999],

            // Saudi Arabia
            ['country' => 'SA', 'name' => 'Riyadh',         'state' => 'Riyadh',          'latitude' => 24.7135517,  'longitude' => 46.6752957],
            ['country' => 'SA', 'name' => 'Jeddah',         'state' => 'Makkah',          'latitude' => 21.485811,   'longitude' => 39.1925048],
            ['country' => 'SA', 'name' => 'Mecca',          'state' => 'Makkah',          'latitude' => 21.3890824,  'longitude' => 39.8579118],

            // Argentina
            ['country' => 'AR', 'name' => 'Buenos Aires',   'state' => 'Buenos Aires',    'latitude' => -34.6036844, 'longitude' => -58.3815591],
            ['country' => 'AR', 'name' => 'Córdoba',        'state' => 'Córdoba',         'latitude' => -31.420083,  'longitude' => -64.188776],
            ['country' => 'AR', 'name' => 'Rosario',        'state' => 'Santa Fe',        'latitude' => -32.9587022, 'longitude' => -60.6930415],

            // South Africa
            ['country' => 'ZA', 'name' => 'Johannesburg',   'state' => 'Gauteng',         'latitude' => -26.2041028, 'longitude' => 28.0473051],
            ['country' => 'ZA', 'name' => 'Cape Town',      'state' => 'Western Cape',    'latitude' => -33.9248685, 'longitude' => 18.4240553],
            ['country' => 'ZA', 'name' => 'Durban',         'state' => 'KwaZulu-Natal',   'latitude' => -29.8586804, 'longitude' => 31.0218404],

            // Nigeria
            ['country' => 'NG', 'name' => 'Lagos',          'state' => 'Lagos',           'latitude' => 6.5243793,   'longitude' => 3.3792057],
            ['country' => 'NG', 'name' => 'Abuja',          'state' => 'Federal Capital Territory', 'latitude' => 9.0764785, 'longitude' => 7.398574],
            ['country' => 'NG', 'name' => 'Kano',           'state' => 'Kano',            'latitude' => 12.0021794,  'longitude' => 8.5919561],

            // Egypt
            ['country' => 'EG', 'name' => 'Cairo',          'state' => 'Cairo',           'latitude' => 30.0444196,  'longitude' => 31.2357116],
            ['country' => 'EG', 'name' => 'Alexandria',     'state' => 'Alexandria',      'latitude' => 31.2000924,  'longitude' => 29.9187387],
            ['country' => 'EG', 'name' => 'Giza',           'state' => 'Giza',            'latitude' => 30.0130557,  'longitude' => 31.2089147],
        ];

        $countryIds = Country::pluck('id', 'code');

        foreach ($cities as $city) {
            $countryId = $countryIds[$city['country']] ?? null;

            if ($countryId === null) {
                continue;
            }

            City::firstOrCreate(
                ['country_id' => $countryId, 'name' => $city['name']],
                [
                    'state'     => $city['state'],
                    'latitude'  => $city['latitude'],
                    'longitude' => $city['longitude'],
                ]
            );
        }
    }
}
