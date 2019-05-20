<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class Employe extends Model
{
        protected $table = 'employees'; 
        protected $casts = ['days'=>'array'];
        protected $fillable = ['days' ,'fisrtname','lastname','piture','address','mobile','categories_id','price','email',];

    public function employe(){
        return $this ->belongsTo('App\Category','id');

    }
 
}
