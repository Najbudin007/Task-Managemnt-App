<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
    {
        $projectId = $request->project_id;
        $tasks = $this->taskService->getTasks($projectId);
        $projects = $this->taskService->getAllProjects();
        return view('pages.task.list', ['tasks' => $tasks, 'projects' => $projects]);
    }

    public function create()
    {
        $projects = $this->taskService->getAllProjects();
        return view('pages.task.create', ['projects' => $projects]);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required'], ['name.required' => 'Task name is required']);
        $this->taskService->createTask($request->only(['name', 'project_id']));
        return redirect()->route('task.index')->with('success', 'Task created successfully.');
    }

    public function edit(string $id)
    {
        $task = $this->taskService->getTasks(null)->find($id);
        $projects = $this->taskService->getAllProjects();
        return view('pages.task.edit', ['task' => $task, 'projects' => $projects]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required'], ['name.required' => 'Task name is required']);
        $this->taskService->updateTask($id, $request->only(['name', 'project_id']));
        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(string $id)
    {
        $this->taskService->deleteTask($id);
        return redirect()->route('task.index')->with('success', 'Task removed successfully.');
    }

    public function shorting(Request $request)
    {
        $this->taskService->updateTaskPriorities($request->sortedIds);
    }
}
