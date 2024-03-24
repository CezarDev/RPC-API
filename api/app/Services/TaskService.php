<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function all()
    {
        $tasks = $this->taskRepository->all();

        foreach ($tasks as $task) {
            $task['status'] = $task->status;
            $task['user'] = $task->user;
        }

        return $tasks;
    }

    public function create(array $data)
    {
        $task = $this->taskRepository->create($data);

        //$this->taskRepository->createUserTask($data['user_id'], $task->id);

        $task['status'] = $task->status;
        $task['user'] = $task->user;

        return $task;
    }

    public function update($id, array $data)
    {
        return $this->taskRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->taskRepository->delete($id);
    }

    public function find($id)
    {
        return $this->taskRepository->find($id);
    }

    public function tasksByUser($userId)
    {
        return $this->taskRepository->tasksByUser($userId);
    }
}
