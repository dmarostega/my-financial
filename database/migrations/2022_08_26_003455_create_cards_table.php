<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('financial_entity_id');
            $table->string('title');
            $table->bigInteger('number')->unsigned();
            $table->string('holder_name');
            $table->string('flag');
            $table->smallInteger('security_code')->nullable();
            $table->enum('type',['credit','debit','multiple','prepaid','virtual'])->default('multiple');
            $table->enum('status',['active','inactive','locked','unlocked','canceled'])->default('locked');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('financial_entity_id')->references('id')->on('financial_entities');
            $table->foreign('financial_entity_user_id')->references('user_id')->on('financial_entities');
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
