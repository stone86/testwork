<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Responses\ApiResponse;
use App\Interfaces\Repositories\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function __construct(private TaskRepositoryInterface $taskRepository)
    {

    }

    public function index(): JsonResponse
    {
        try {
            return ApiResponse::return($this->taskRepository->getAll());
        }catch (\Throwable $e) {
            return ApiResponse::return(message: $e->getMessage(),success: false);
        }
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        try {
            $task = $this->taskRepository->add($request->toArray());
            if ($task)
                return ApiResponse::return($task);

            throw new ApiException('Something went wrong');
        }catch (\Throwable $e) {
            return ApiResponse::return(message: $e->getMessage(),success: false);
        }
    }

    public function update(int $id, UpdateTaskRequest $request): JsonResponse
    {
        try {
            $task = $this->taskRepository->update($id, $request->toArray());
            if ($task)
                return ApiResponse::return($task);

            throw new ApiException('Something went wrong');
        }catch (\Throwable $e) {
            return ApiResponse::return(message: $e->getMessage(),success: false);
        }
    }


    public function destroy(int $id): JsonResponse
    {
        try {
            if ( $this->taskRepository->delete($id) )
                return ApiResponse::return(message: 'Deleted');
            else
                throw new ApiException('Something went wrong');
        }catch (\Throwable $e) {
            return ApiResponse::return(message: $e->getMessage(),success: false);
        }
    }
}
