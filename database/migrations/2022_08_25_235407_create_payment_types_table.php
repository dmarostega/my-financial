<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();            
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('type',[  
                                    "dinheiro",
                                    "credito",
                                    "debito",
                                    "transferencia",
                                    "boleto",
                                    "cheque",
                                    "pix"
                                ]);
            $table->tinyInteger('allow_installmentss')->default(false);
            $table->integer('max_installments')->default(1);
            $table->enum('discount_timing', ['immediate', 'delayed'])->default('immediate');
            $table->tinyInteger('is_default')->default('false');
            $table->enum('status', ['active','inactive', 'obsolete'])->default('active');
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
        Schema::dropIfExists('payment_types');
    }
}
