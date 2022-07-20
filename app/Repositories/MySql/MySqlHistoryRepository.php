<?php
namespace App\Repositories\MySql;

use App\Interfaces\Repositories\HistoryRepositoryInterface;
use App\Models\History;
use App\Models\Task;

class MySqlHistoryRepository implements HistoryRepositoryInterface
{

    public function writeAdd(Task $task): bool
    {
        try {
            History::create([
                'event_name' => 'add',
                'task_id' => $task->id,
                'user_id' => $task->user_id
            ]);

            return true;
        }catch (\Throwable $e){
            return false;
        }
    }

    public function writeUpdate(Task $task): bool
    {
        try {
            History::create([
                'event_name' => 'update',
                'task_id' => $task->id,
                'user_id' => $task->user_id
            ]);

            return true;
        }catch (\Throwable $e){
            return false;
        }
    }

    public function writeDelete(Task $task): bool
    {
        try {
            History::create([
                'event_name' => 'delete',
                'task_id' => $task->id,
                'user_id' => $task->user_id
            ]);

            return true;
        }catch (\Throwable $e){
            return false;
        }
    }
}
