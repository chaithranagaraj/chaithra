<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable =[ 
    		'name','email','message','created_by','updated_by',

    ];

    protected $primaryKey ='test_id';
}
