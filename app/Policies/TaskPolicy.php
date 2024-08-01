<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    public function view(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
    
    public function complete(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    public function delete(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    public function before($user, $ability, $task = null)
    {
        if ($task && $user->id !== $task->user_id) {
            abort(403, 'No tienes permiso para realizar esta acción.');
        }
    }
    
}
