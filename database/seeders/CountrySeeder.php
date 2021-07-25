<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withOptions(['debug' => true,'verify'=> false])->withHeaders([
            'X-CSCAPI-KEY' => env('COUNTRY_API_KEY'),
        ])->get('https://api.countrystatecity.in/v1/countries');
        $response = strval($response->getBody());
        $response = json_decode($response, true);
        foreach ($response as $country) {
            Country::insert(
                [
                    ['name' => $country['name'], 'iso2' => $country['iso2']],
                ]
            );
        }
    }
}
