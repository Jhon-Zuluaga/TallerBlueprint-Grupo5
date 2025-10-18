<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\ProjectUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuarios
        $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::create([
            'name' => 'Ana Pérez',
            'email' => 'ana@example.com',
            'password' => bcrypt('password'),
        ]);

        $user3 = User::create([
            'name' => 'Carlos Ruiz',
            'email' => 'carlos@example.com',
            'password' => bcrypt('password'),
        ]);

        // proyectos
        $project1 = Project::create([
            'title' => 'Sistema de Gestión Interna',
            'description' => 'Aplicación para administrar procesos internos de la empresa.',
            'owner_id' => $user1->id,
        ]);

        $project2 = Project::create([
            'title' => 'Plataforma Educativa',
            'description' => 'Proyecto para desarrollar una plataforma de cursos online.',
            'owner_id' => $user2->id,
        ]);

        // tareas
        Task::insert([
            [
                'project_id' => $project1->id,
                'name' => 'Diseñar base de datos',
                'description' => 'Definir estructura de tablas y relaciones',
                'status' => 'pendiente',
                'due_date' => '2025-10-20',
            ],
            [
                'project_id' => $project1->id,
                'name' => 'Configurar entorno',
                'description' => 'Preparar entorno de desarrollo con Laravel',
                'status' => 'completado',
                'due_date' => '2025-10-10',
            ],
            [
                'project_id' => $project2->id,
                'name' => 'Crear interfaz principal',
                'description' => 'Diseñar la vista principal de la aplicación',
                'status' => 'pendiente',
                'due_date' => '2025-10-25',
            ],
            [
                'project_id' => $project2->id,
                'name' => 'Configurar autenticación',
                'description' => 'Implementar login y registro con roles',
                'status' => 'pendiente',
                'due_date' => '2025-10-30',
            ],
        ]);

        // Asignar usuarios a proyectos 
        ProjectUser::insert([
            ['project_id' => $project1->id, 'user_id' => $user1->id, 'role' => 'Propietario'],
            ['project_id' => $project1->id, 'user_id' => $user2->id, 'role' => 'Colaborador'],
            ['project_id' => $project2->id, 'user_id' => $user2->id, 'role' => 'Propietario'],
            ['project_id' => $project2->id, 'user_id' => $user3->id, 'role' => 'Revisor'],
        ]);
    }
}
