<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Task;
use App\Policies\TaskPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * El mapa de políticas de autorización.
     *
     * @var array
     */
    protected $policies = [
        // Mapea el modelo Task a la política TaskPolicy
        Task::class => TaskPolicy::class,
    ];

    /**
     * Registra cualquier servicio de autenticación / autorización.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define las políticas de autorización para tareas
        Gate::define('update-task', [TaskPolicy::class, 'update']);
        Gate::define('complete-task', [TaskPolicy::class, 'complete']);
    }
}
