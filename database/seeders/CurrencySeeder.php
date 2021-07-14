<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //todo options are for dev env,
        // try with verify => true for production env with HTTPS
        $result =  Http::withOptions(['debug' => true,'verify'=> false])->get('https://api.coinstats.app/public/v1/coins');
        foreach ($result['coins'] as $coin) {
            $file = file_get_contents($coin['icon']);
            $base64 = base64_encode($file);
            Currency::insert(
                [
                    ['name' => $coin['id'], 'icon' => $base64, 'is_active' => 1, 'price' => $coin['price'], 'min' => null, 'max' => null, 'admin_id' => 1],
                ]
            );
        }
    }
}
