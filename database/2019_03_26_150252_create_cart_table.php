<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			 $table->string('worker_name');
			  $table->string('worker_id');
			   $table->string('user_id');
			    $table->string('users_email');
			   $table->time('time');
             $table->string('days');
			  $table->double('price');
			         $table->string('session_id');
			    $table->string('description');
			    $table->string('address_address')->nullable();
    $table->double('address_latitude')->nullable();
    $table->double('address_longitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
