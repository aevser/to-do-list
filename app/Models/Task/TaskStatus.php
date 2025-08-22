<?php

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskStatus extends Model
{
    protected $fillable = ['name', 'type'];

    /*
     * Вспомогательные методы
     */

    public static function getIdByType(string $type): int
    {
        return self::query()->where('type', $type)->first()->id;
    }

    /*
     * Отношения
     */

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
