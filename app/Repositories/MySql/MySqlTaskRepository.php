<?php

namespace App\Repositories\MySql;

use App\Interfaces\Repositories\TaskRepositoryInterface;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class MySqlTaskRepository implements TaskRepositoryInterface
{
    public function getByUser(User $user): Collection
    {
        return Task::where('user_id', $user->__get('id'))->get();
    }

    public function getAll(): Collection
    {
        return Task::all();
    }

    public function get(int $id): ?Task
    {
        return Task::find($id);
    }

    public function add(array $data): ?Task
    {
        $task = new Task($data);
        $task->save();

        return $task;
    }

    public function update(int $id, array $data): ?Task
    {
        $task = Task::find($id);
        if(!$task)
            return null;

        $task->fill($data);
        $task->save();

        return $task;
    }

    public function delete(int $id): bool
    {
        return Task::where('id', $id)->delete();
    }
}
