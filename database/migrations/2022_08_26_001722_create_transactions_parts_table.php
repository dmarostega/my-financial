<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained();
            $table->dateTime('due_date');
            $table->double('value');
            $table->double('value_paid')->default('0');
            $table->dateTime('payment_date')->nullable();
            $table->smallInteger('parcel')->default('1');
            $table->double('discount')->default('0');
            $table->double('fees')->default('0'); // tarifas
            $table->enum('status', ['active','inactive'])->default('active');
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
        Schema::dropIfExists('transactions_parts');
    }
}
