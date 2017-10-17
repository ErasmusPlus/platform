<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
  public function application()
  {
      return $this->hasOne('App\Application','id','app_id');
  }
}
