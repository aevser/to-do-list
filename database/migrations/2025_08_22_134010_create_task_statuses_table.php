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
        Schema::create('task_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('task_statuses')->insert([
            [
                'name' => 'Новая',
                'type' => 'new',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'В ожидании',
                'type' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'В работе',
                'type' => 'in_progress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'На проверке',
                'type' => 'review',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Завершена',
                'type' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Отменена',
                'type' => 'cancelled',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_statuses');
    }
};
