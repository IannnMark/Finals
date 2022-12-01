<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
           
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('lname');
            $table->text('fname');
            $table->text('address');
            $table->text('phone');
            $table->string('image')->default('image.jpg');
            $table->softDeletes();
            $table->timestamps();
        });


        
        Schema::create('pets', function ($table) {
            $table->increments('id');
            $table->text('pet_name');
            $table->text('description');
            $table->text('pet_age');
            $table->text('pet_gender');
            $table->text('pet_image');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->softDeletes();
            $table->timestamps();
     
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
        Schema::drop('pets');
    }
}
