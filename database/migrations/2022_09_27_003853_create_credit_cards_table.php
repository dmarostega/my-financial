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
            $table->foreignId('card_user_name')->constrained();
            $table->foreignId('card_user_id')->constrained();
            $table->foreignId('card_user_person_id')->constrained();
            $table->double('credit');
            $table->double('amount');
            $table->timestamps();
            $table->softDeletes();              
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
