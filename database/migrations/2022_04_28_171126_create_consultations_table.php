<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('veterinary_id')->unsigned();
            $table->foreign('veterinary_id')->references('id')->on('veterinarians');
            $table->integer('pet_id')->unsigned();
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->integer('disease_id')->unsigned();
            $table->foreign('disease_id')->references('id')->on('diseases');
            $table->date('checkup_date');
            $table->string('comments');
            $table->decimal('cost');
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
        Schema::dropIfExists('consultations');
    }
}
