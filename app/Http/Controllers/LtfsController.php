<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LtfsController extends Controller
{
    public function ltfsApi( Request $req ){

        // return $req;
        
        $http = new Client;
        // return env('API_PASS');
        $pass = 'L(F$78w3!';
        
        $response = $http->post('https://app27.clone.workline.hr/api/Ta/WLAPIBGVData',[
            'headers' => [ 
                'Authorization' => 'Basic TFRGU19CR1Y6TChGJDc4dzMh',       
                // 'Authorization' => env('APP_KEY'),
                // 'Authorization' => `Basic ${env('App_key')}`
                // 'Authorization' => 'Basic' .env('App_key')
            ],
                
            'query' => [
                'Username' => 'LTFS_BGV',
                'Password' => urlencode($pass),
                'AppID' => 'MYLTFSBGV',
                'FromDate' => '13-Mar-2023',
                'ToDate' => '14-Mar-2023'
            ]
        ]);

        // dd($response);
    
        $result = json_decode((string) $response -> getBody(), true);

        return dd($result);
    }
}
