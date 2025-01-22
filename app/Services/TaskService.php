<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Task;

class TaskService
{
    public function getTasks($projectId)
    {
        $tasksQuery = Task::orderBy('priority', 'asc')->with(['project']);
        $tasksQuery->when($projectId, function ($query) use ($projectId) {
            $query->where('project_id', $projectId);
        });
        return $tasksQuery->paginate(10);
    }

    public function getAllProjects()
    {
        return Project::all();
    }

    public function createTask($data)
    {
        return Task::create($data);
    }

    public function updateTask($id, $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }

    public function updateTaskPriorities($sortedIds)
    {
        foreach ($sortedIds as $index => $taskId) {
            Task::where('id', $taskId)->update(['priority' => $index + 1]);
        }
    }
}
