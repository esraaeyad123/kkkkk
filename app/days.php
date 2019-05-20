<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class days extends Model
{
    //
	protected $table = 'days'; 
	 protected $casts = ['days'=>'array'];
}
