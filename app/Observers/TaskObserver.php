<?php

namespace App\Observers;

use App\Interfaces\Repositories\HistoryRepositoryInterface;
use App\Models\History;
use App\Models\Task;

class TaskObserver
{

    public function __construct(private HistoryRepositoryInterface $historyRepository)
    {

    }

    /**
     * Handle the Task "created" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function created(Task $task)
    {
        $this->historyRepository->writeAdd($task);
    }

    /**
     * Handle the Task "saved" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function saved(Task $task)
    {
        $this->historyRepository->writeUpdate($task);
    }

    /**
     * Handle the Task "updated" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function updated(Task $task)
    {
        $this->historyRepository->writeUpdate($task);
    }

}
