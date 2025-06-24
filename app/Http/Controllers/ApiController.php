<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function send()
    {
        $url = config('services.whatsapp_fonnte.url');
        $token = config('services.whatsapp_fonnte.token');

        if (empty($url) || empty($token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'API URL atau Token belum diatur di konfigurasi.'
            ]);
        }

        $target = "6289507525670";
        $message = "Test message dari Laravel Controller";

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => [
                'target' => $target,
                'message' => $message,
            ],
            CURLOPT_HTTPHEADER => [
                "Authorization: $token",
                "Accept: application/json",
            ],
            CURLOPT_TIMEOUT => 10,
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            curl_close($curl);
            return response()->json(['status' => 'error', 'message' => $error_msg]);
        }

        curl_close($curl);

        $responseDecoded = json_decode($response, true);

        return response()->json([
            'status' => 'success',
            'response' => $responseDecoded ?? $response,
        ]);
    }

    public function view()
    {
        return view('api'); // view form biasa
    }
}