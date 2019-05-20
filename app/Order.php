<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	
	public function order()
{
    return $this->hasMany('app\models\Cart');
}
    public function setcartAttribute($value)
    {
        $this->attributes['cart'] = serialize($value);
    }
	protected $cart = [
    'cart' => 'array',
];

	public function getCartAttribute($table)
{  
    return unserialize($table);
}
}
