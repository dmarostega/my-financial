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
            $table->unsignedBigInteger('card_user_id');
            $table->decimal('credit', 20, 2)->default(0);
            $table->decimal('amount', 20, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('card_user_id')->references('user_id')->on('cards');
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
