<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('financial_entity_id');
            $table->string('user_name');
            $table->double('credit');
            $table->double('amount');
            $table->timestamps();
            
            $table->foreign('financial_entity_id')->references('id')->on('financial_entities');
            $table->foreign('user_name')->references('name')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_cards');
    }
}
