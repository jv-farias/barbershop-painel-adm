<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('week_days', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        $weekDays = [
            ['slug' => 'seg', 'name' => 'Segunda-feira'],
            ['slug' => 'ter', 'name' => 'Terça-feira'],
            ['slug' => 'qua', 'name' => 'Quarta-feira'],
            ['slug' => 'qui', 'name' => 'Quinta-feira'],
            ['slug' => 'sex', 'name' => 'Sexta-feira'],
            ['slug' => 'sab', 'name' => 'Sábado'],
            ['slug' => 'dom', 'name' => 'Domingo'],
        ];

        foreach ($weekDays as $day) {
            DB::table('week_days')->insert([
                'slug' => $day['slug'],
                'name' => $day['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('week_days');
    }
};
