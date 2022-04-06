<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
    	'name','address','email','phone','mobile','logo','city','country','zip_code'
    ];
}
