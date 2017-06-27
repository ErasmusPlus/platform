<?php

namespace App\Classes;

use Session;

class EGuard
{
    public static function user()
    {
      return Session()->get('current_user');
    }
}

?>