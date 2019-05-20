<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->string('lastname');
            $table->string('firstname', 60);
            $table->string('address', 120);
            $table->string('picture', 60);
			 $table->string('mobile');
			  $table->time('time');
             $table->string('days');
            $table->softDeletes();
			$table->string('category_name');
			$table->integer('categories_id');
			$table->float('price');
			$table->string('email',90)->unique();
            $table->timestamp('email_verified_at')->nullable();
			$table->integer('parent_id');
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
