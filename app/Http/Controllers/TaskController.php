<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        return $this->taskRepository->browse();
    }

    public function browseSpecific($id)
    {
        return $this->taskRepository->browseSpecific($id);
    }

    public function createTask(Request $request)
    {
        $request->validate([
	        'name' => 'required',
	        'status' => 'required',
	    ]);

        return $this->taskRepository->createTask($request);
    }
    
    public function updateTask(Request $request, $id)
    {
        $request->validate([
	        'name' => 'required',
	    ]);

        return $this->taskRepository->updateTask($request, $id);
    }

    public function markAsCompleted(Request $request, $id)
    {
        return $this->taskRepository->markAsCompleted($request, $id);
    }    

    public function deleteTask($id)
    {
        return $this->taskRepository->deleteTask($id);
    }    
}
