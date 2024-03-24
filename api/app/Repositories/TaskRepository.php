<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends BaseRepository
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function tasksByUser($userId)
    {
        return $this->model->where('user_id', $userId)->with('status')->get();
        //return $this->model->where('user_id', $userId)->get();
    }
}
