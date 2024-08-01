<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Tag;
use App\Models\User;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // Asegúrate de que haya al menos un usuario creado

        $tasks = [
            ['name' => 'Comprar leche', 'description' => 'Compra leche en el supermercado'],
            ['name' => 'Hacer tarea', 'description' => 'Terminar el proyecto de Laravel'],
        ];

        foreach ($tasks as $task) {
            $task = Task::create(array_merge($task, ['user_id' => $user->id]));
            $task->tags()->attach(Tag::inRandomOrder()->take(2)->pluck('id'));
        }
    }
}
