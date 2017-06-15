<?php

namespace App\Classes;

use Guzzle;

class Students
{
    public static function auth($username, $password)
    {

      $client = new Guzzle(['defaults' => [
        'verify' => false
      ]]);
      

      $response = $client::post(
          'https://students.uowm.gr/login.asp',
          [
              'form_params' => [
                  'userName' => $username,
                  'pwd' => $password,
              ]
          ],
          ['verify' => false]
      );

      dd($username);
    }
}

?>
