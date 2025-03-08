<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TodoPolicy
{
    private function ownsTodo(User $user, Todo $todo)
    {
        return $user->id === $todo->user_id;
    }

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Todo $todo): bool
    {
        return $this->ownsTodo($user, $todo);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Todo $todo): bool
    {
        return $this->ownsTodo($user, $todo);
    }

    public function share(User $user, Todo $todo): bool
    {
        return $this->ownsTodo($user, $todo);
    }

    public function delete(User $user, Todo $todo): bool
    {
        return $this->ownsTodo($user, $todo);
    }

    public function restore(User $user, Todo $todo): bool
    {
        return $this->ownsTodo($user, $todo);
    }

    public function forceDelete(User $user, Todo $todo): bool
    {
        return $this->ownsTodo($user, $todo);
    }
}
