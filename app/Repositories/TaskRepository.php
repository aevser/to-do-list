<?php

namespace App\Repositories;

use App\Constants\DefaultSort;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    private const string RELATIONS = 'status';

    public function __construct(private Task $model){}

    public function getAll(): Collection
    {
        return $this->model->query()
            ->with(self::RELATIONS)
            ->orderBy(DefaultSort::DEFAULT_SORT_ID, DefaultSort::DEFAULT_DESC)
            ->get();
    }

    public function findById(int $id): Task
    {
        return $this->model->query()->with(self::RELATIONS)->findOrFail($id);
    }

    public function create(array $data): Task
    {
        $task = $this->model->query()->create($data);

        return $task->load(self::RELATIONS);
    }

    public function update(int $id, array $data): Task
    {
        $task = $this->model->query()->findOrFail($id);

        $task->update($data);

        return $task->load(self::RELATIONS);
    }

    public function delete(int $id): bool
    {
        return $this->model->query()->findOrFail($id)->delete();
    }
}
