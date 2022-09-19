<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function customhelper(){
        $date = '10-sep-22';
        $formate = 'd-m-y h:i s A';

       $dateformate =  dateFormate($date, $formate);
       print_r($dateformate);

       $filename = "attcement.pdf";
       $url = pathUrl($filename, 'upload','ser');
        '<pre>';
        print_r($url);
        '</pre>';
        $b = true;

        $ab = abf(3,$b);

        print_r($ab);
    }
    public function helper(){
       $ff=  abf(4,8);
        return $ff;
    }
    public function http_client2(){
        $curl = curl_init();
        curl_setopt_array($curl,[
        CURLOPT_URL            =>'https://reqres.in/api/users',
        CURLOPT_RETURNTRANSFER => true,         // return web page
        // CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_FOLLOWLOCATION => true,         // follow redirects
        CURLOPT_ENCODING       => "",           // handle all encodings
        // CURLOPT_CUSTOMREQUEST     => "GET",
        CURLOPT_TIMEOUT        => 120,          // timeout on response  
        CURLOPT_HTTPHEADER        =>['Content-Type:application/json']  
        ]);
    $response =curl_exec($curl);
    $error = curl_errno($curl);
    curl_close($curl);
    if($error){
        return response(['error'=>'true', 'msg'=>'$error']);
    }
    $response = json_decode($response, true);
    return $response;
    }

    public function http_client(){
        $response = Http::get('https://reqres.in/api/users');
        return $response->json();
    }

    public function httpregister(Request $request){
        $responsData = $request->all();
        $response = Http::post('https://reqres.in/api/register', [
            'email'=> $responsData['email'],
            'password'=> $responsData['password']
        ]);
        return $response->json();
    }
}
