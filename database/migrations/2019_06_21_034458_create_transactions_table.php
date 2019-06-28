<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_number');
            $table->integer('user_id')->unsigned();
            $table->integer('credtis')->unsigned();
            $table->integer('processed_by')->unsigned();
            $table->enum('payment_method',['bank','credit-card'])->default('bank');
            $table->string('payment_gateway');
            $table->double('price');
            $table->enum('status', ['Paid', 'Pending'])->default("Pending");
            $table->text('data');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
