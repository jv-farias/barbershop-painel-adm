<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('general_information', function (Blueprint $table) {
            $table->id();
            $table->string('barbershop_name');
            $table->string('document')->unique();
            $table->string('responsible_name');
            $table->string('email')->unique();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->timestamps();
        });
    }

        public function down(): void
    {
        Schema::dropIfExists('general_information');
    }
};
