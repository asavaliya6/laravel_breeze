<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->nullable()->unique();
            $table->string('product_name');
            $table->integer('quantity');
            $table->decimal('amount', 10, 2);
            $table->string('currency');
            $table->string('payer_name')->nullable();
            $table->string('payer_email')->nullable();
            $table->string('card_brand')->nullable();  
            $table->string('card_last4')->nullable();  
            $table->string('country')->nullable();
            $table->string('payment_status');
            $table->string('payment_method');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
