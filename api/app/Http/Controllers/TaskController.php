<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;


class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        return response()->json(['tasks' => $this->taskService->all()]);
    }

    public function store(StoreTaskRequest $request)
    {
        try {
            return response()->json([
                'task'   => $this->taskService->create($request->all()),
                'message' => 'Tarefa criada com sucesso',
                201
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        $task = $this->taskService->find($id);

        if (!$task)
            return response()->json(['message' => 'Tarefa não encontrada'], 404);

        return response()->json(['task' => $task]);
    }

    public function update(UpdateTaskRequest $request, string $id)
    {
        try {
           $updated =  $this->taskService->update($id, $request->all());

              if (!$updated)
                 return response()->json(['message' => 'Não foi possível atualizar'], 404);

            return response()->json([
                'task'    => $this->taskService->find($id),
                'message' => 'Tarefa atualizada com sucesso'
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $task = $this->taskService->find($id);

            if (!$task)
                return response()->json(['message' => 'Tarefa não encontrada'], 404);

            $this->taskService->delete($id);

            return response()->json([
                'message' => 'Tarefa deletada com sucesso',
                'tasks'   => $this->taskService->all()
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function tasksByUser(string $userId)
    {
        return response()->json($this->taskService->tasksByUser($userId));
    }
}
