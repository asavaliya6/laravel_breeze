<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('paypals', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id');
            $table->string('product_name');
            $table->integer('quantity');
            $table->decimal('amount', 10, 2);
            $table->string('currency');
            $table->string('payer_name');
            $table->string('payer_email');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paypals');
    }
};