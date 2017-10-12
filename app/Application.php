<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    public function getDate()
    {
        return array('created_at', 'date_time_field');
    }

}
