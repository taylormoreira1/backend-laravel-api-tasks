<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TaskController extends Controller
{

    public function index()
    {
        return Task::where('user_id', auth()->user()->id)->get();
    }


    public function store(TaskRequest $request)
    {
        $task = Task::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $request->deadline ? $request->deadline : null,
        ]);

        return response()->json($task, 201);
    }

    public function update(TaskRequest $request, Task $task)
    {
        if ($task->user_id !== auth()->user()->id) {
            return response()->json(['error' => 'Você não tem permissão para editar esta tarefa'], 403);
        }

        $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $request->deadline ? $request->deadline : null,
        ]);

        return response()->json(['message' => 'Tarefa atualizada com sucesso', 'task' => $request->deadline], 200);
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->user()->id) {
            return response()->json(['error' => 'Você não tem permissão para excluir esta tarefa'], 403);
        }

        $task->delete();

        return response()->json(['message' => 'Tarefa excluída com sucesso'], 200);
    }
}
