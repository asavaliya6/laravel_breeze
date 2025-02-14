<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('realrole_realuser', function (Blueprint $table) {
            $table->id();
            $table->foreignId('realuser_id')->constrained()->onDelete('cascade');
            $table->foreignId('realrole_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('realrole_realuser');
    }
};

