<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{

    public function CurrAppls1()
    {
        return hasMany('App\Application','u1_id','id');
    }

    public function CurrAppls2()
    {
        return hasMany('App\Application','u2_id','id');
    }

    public function CurrAppls3()
    {
        return hasMany('App\Application','u3_id','id');
    }

}
