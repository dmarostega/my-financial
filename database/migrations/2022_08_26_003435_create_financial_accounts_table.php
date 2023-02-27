<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('financial_entity_id');
            $table->unsignedBigInteger('financial_entity_user_id');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('person_id')->constrained();
            $table->string('user_name');
            $table->string('entity_number',200);
            $table->string('entity_dv',5);
            $table->string('account',200);
            $table->string('account_dv',2);
            $table->enum('status', ['active','inactive'])->default('active');
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
        Schema::dropIfExists('financial_accounts');
    }
}
