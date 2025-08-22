<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Task\CreateTaskRequest;
use App\Http\Requests\V1\Task\UpdateTaskRequest;
use App\Http\Resources\Task\IndexTaskResource;
use App\Repositories\TaskRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    use ApiResponse;

    public function __construct(private TaskRepository $taskRepository){}

    public function index(): JsonResponse
    {
        $tasks = $this->taskRepository->getAll();

        return $this->success(data: IndexTaskResource::collection($tasks)->toArray(request()));
    }

    public function show(int $id): JsonResponse
    {
        $task = $this->taskRepository->findById($id);

        return $this->success(data: new IndexTaskResource($task)->toArray(request()));
    }

    public function store(CreateTaskRequest $request): JsonResponse
    {
        $task = $this->taskRepository->create($request->validated());

        return $this->success(message: trans('responses.task_created'), data: IndexTaskResource::make($task)->toArray(request()));
    }

    public function update(UpdateTaskRequest $request, int $id): JsonResponse
    {
        $task = $this->taskRepository->update($id, $request->validated());

        return $this->success(message: trans('responses.task_updated'), data: IndexTaskResource::make($task)->toArray(request()));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->taskRepository->delete($id);

        return $this->successMessage(message: trans('responses.task_deleted'));
    }
}
