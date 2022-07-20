<?php
namespace App\Interfaces\Repositories;

use App\Models\Task;

interface HistoryRepositoryInterface
{
    public function writeAdd(Task $task):bool;

    public function writeUpdate(Task $task):bool;

    public function writeDelete(Task $task):bool;
}
