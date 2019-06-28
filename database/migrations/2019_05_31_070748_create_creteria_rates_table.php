<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreteriaRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creteria_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creteria_id')->unsigned();
            $table->integer('slot_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer("rate")->nullable();
            $table->timestamps();

            $table->foreign('slot_id')
                ->references('id')->on('slots')
                ->onDelete('cascade');

            $table->foreign('creteria_id')
                ->references('id')->on('creterias')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creteria_rates');
    }
}
