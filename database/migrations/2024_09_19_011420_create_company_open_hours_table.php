<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('company_open_hours', function (Blueprint $table) {
            $table->id();
            $table->time('start_time');
            $table->time('end_time');
            $table->foreignId('week_day_id')->constrained('week_days');
            $table->foreignId('general_information_id')->constrained('general_information')->onDelete('cascade'); // Adiciona a relação com general_information
            $table->time('hour_start_1')->nullable();
            $table->time('hour_stop_1')->nullable()->after('hour_start1');
            $table->time('hour_start_2')->nullable();
            $table->time('hour_stop_2')->nullable()->after('hour_start2');
            $table->time('hour_start_3')->nullable();
            $table->time('hour_stop_3')->nullable()->after('hour_start3');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_open_hours');
    }
};
