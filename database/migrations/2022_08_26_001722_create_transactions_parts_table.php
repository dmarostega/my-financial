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
            $table->decimal('value', 20, 2);
            $table->decimal('value_paid', 20, 2)->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->smallInteger('part_number')->default(1);
            $table->decimal('discount', 4, 2)->default(0);
            $table->decimal('fees', 4, 2)->default(0); // tarifas
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
