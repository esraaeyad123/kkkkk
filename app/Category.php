<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employe;
use App\User;

class Category extends Model
{
	
 protected $table = 'categories';
 
 public function categories(){
    // return $this->hasMany( Employe::class);
	
	
return $this->hasMany( 'App\Employe' ,'id' , 'categories_id');
 
 
 }
}
