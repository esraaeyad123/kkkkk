<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
		public function order()
{
    return $this->hasMany('app\models\order');
}
	public $table ='cart' ;
        protected $fillable = array (
        'name',
        'address_address',
        'address_latitude',
        'address_longitude',
    );
	
	
	public function getCartAttribute($table)
{  
    return unserialize($table);
}
}
