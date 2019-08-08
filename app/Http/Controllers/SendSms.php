<?php


namespace App\Http\Controllers;


use GuzzleHttp\Client;

class SendSms
{


    function Sendsms($messege, $to)
    {
        $username = env('SMS_USER', null);
        $password = env('SMS_PASSWORD', null);
        $url = env('SMS_URL', null);
        $from = env('SMS_NUMBER', null);
        $cliend = new Client();
        $response = $cliend->request('GET', $url, ['query' => [
            'UserName' => $username,
            'Password' => $password,
            'Message' => $messege,
            'From' => $from,
            'To' => $to,
        ]]);


    }

    function Getinfo()
    {
        $username = env('SMS_USER', null);
        $password = env('SMS_PASSWORD', null);
        $url = env('SMS_Center', null);
        $cliend = new Client();

        $response = $cliend->request('GET', $url, ['query' => [
            'userName' => $username,
            'Password' => $password,

        ]]);
        return $response;
    }
}