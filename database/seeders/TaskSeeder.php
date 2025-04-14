<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::insert([
            [
                'title' => 'Написать документацию',
                'description' => 'Подготовить Swagger/OpenAPI',
                'status' => 'TODO',
                'importance' => 5,
                'deadline' => Carbon::now()->addDays(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Обновить README',
                'description' => 'Добавить инструкции по развертыванию',
                'status' => 'IN_PROGRESS',
                'importance' => 3,
                'deadline' => Carbon::now()->addDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Удалить временные файлы',
                'description' => 'Очистка после билда',
                'status' => 'COMPLETED',
                'importance' => 2,
                'deadline' => Carbon::now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
