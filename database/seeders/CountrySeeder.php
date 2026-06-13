<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            ['name' => 'United States',  'code' => 'US', 'capital' => 'Washington D.C.', 'currency' => 'USD'],
            ['name' => 'United Kingdom', 'code' => 'GB', 'capital' => 'London',           'currency' => 'GBP'],
            ['name' => 'Germany',        'code' => 'DE', 'capital' => 'Berlin',            'currency' => 'EUR'],
            ['name' => 'France',         'code' => 'FR', 'capital' => 'Paris',             'currency' => 'EUR'],
            ['name' => 'Japan',          'code' => 'JP', 'capital' => 'Tokyo',             'currency' => 'JPY'],
            ['name' => 'China',          'code' => 'CN', 'capital' => 'Beijing',           'currency' => 'CNY'],
            ['name' => 'India',          'code' => 'IN', 'capital' => 'New Delhi',         'currency' => 'INR'],
            ['name' => 'Brazil',         'code' => 'BR', 'capital' => 'Brasília',          'currency' => 'BRL'],
            ['name' => 'Canada',         'code' => 'CA', 'capital' => 'Ottawa',            'currency' => 'CAD'],
            ['name' => 'Australia',      'code' => 'AU', 'capital' => 'Canberra',          'currency' => 'AUD'],
            ['name' => 'Mexico',         'code' => 'MX', 'capital' => 'Mexico City',       'currency' => 'MXN'],
            ['name' => 'South Korea',    'code' => 'KR', 'capital' => 'Seoul',             'currency' => 'KRW'],
            ['name' => 'Italy',          'code' => 'IT', 'capital' => 'Rome',              'currency' => 'EUR'],
            ['name' => 'Spain',          'code' => 'ES', 'capital' => 'Madrid',            'currency' => 'EUR'],
            ['name' => 'Netherlands',    'code' => 'NL', 'capital' => 'Amsterdam',         'currency' => 'EUR'],
            ['name' => 'Saudi Arabia',   'code' => 'SA', 'capital' => 'Riyadh',            'currency' => 'SAR'],
            ['name' => 'Argentina',      'code' => 'AR', 'capital' => 'Buenos Aires',      'currency' => 'ARS'],
            ['name' => 'South Africa',   'code' => 'ZA', 'capital' => 'Pretoria',          'currency' => 'ZAR'],
            ['name' => 'Nigeria',        'code' => 'NG', 'capital' => 'Abuja',             'currency' => 'NGN'],
            ['name' => 'Egypt',          'code' => 'EG', 'capital' => 'Cairo',             'currency' => 'EGP'],
        ];

        foreach ($countries as $country) {
            Country::firstOrCreate(['code' => $country['code']], $country);
        }
    }
}
