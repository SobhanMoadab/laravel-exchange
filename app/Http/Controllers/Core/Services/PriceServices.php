<?php


namespace App\Http\Controllers\Core\Services;

use Error;
use Illuminate\Http\Request;

class PriceServices
{
    public function get_currencies()
    {
        try {
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.coinstats.app/public/v1/coins',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_SSL_VERIFYHOST => 0,
            ));


            $response = curl_exec($curl);
            if ($response === false) {
                throw new \Exception(curl_error($curl), curl_errno($curl));
            }

            curl_close($curl);
            return ['currencies' => $response];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function get_currency_by_id($id)
    {
        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.coinstats.app/public/v1/coins/$id",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);

            curl_close($curl);
           if($response == '{}'){
              return ['error' => 'id is not correct'];
           }
            return ['currency' => $response];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
