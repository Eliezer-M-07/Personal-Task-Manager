<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->orderByRaw('due_date IS NULL, due_date ASC')->paginate(6);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        
        auth()->user()->tasks()->create($data + [
            'is_completed' => false,
        ]);

        return redirect('/tasks')->with('success', 'Tarefa adicionada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = auth()->user()->tasks()->findOrFail($id);
        return view('tasks.read', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = auth()->user()->tasks()->findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->validated();

        $task = auth()->user()->tasks()->findOrFail($id);

        $task->update($data);

        return redirect('/tasks/' . $id)->with('success', 'Tarefa atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = auth()->user()->tasks()->findOrFail($id);
        $task->delete();

        return redirect('/tasks')->with('success', 'Tarefa excluida com sucesso.');
    }

    public function toggle(Task $task)
    {
        $task->is_completed = !$task->is_completed;
        $task->save();

        return back()->with('success', 'Status da tarefa atualizado!');
    }
}
