<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    	protected $fillable = [
        'name', 'lname', 'idnum', 'dob', 'pob', 'resplace', 'numstreet', 'postalcode', 'tel', 'mobile', 'mail', 'typestudent', 'yearun', 'univ', 'dep', 'country', 'past', 'aboutme'
    ];
}


?>
