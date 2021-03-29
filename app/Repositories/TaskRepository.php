<?php

namespace App\Repositories;

class TaskRepository
{
    public function __construct($task)
    {
        $this->task = $task;
    }

    public function browse()
    {
        try {
            return $this->task->all();
        } catch (\Exception $e) {
			return response()->json(['E_API_ERROR' => $e->getMessage()], 500);
		}
    }

    public function browseSpecific($id)
    {
        try {
            return $task = $this->task->findOrFail($id);
        } catch (\Exception $e) {
			return response()->json(['E_API_ERROR' => $e->getMessage()], 500);
		}        
    }
    
    public function createTask($data)
    {
        try {
			return $this->task->create([
				'name' => $data->name,
				'status' => $data->status,
			]);
        } catch (\Exception $e) {
			return response()->json(['E_API_ERROR' => $e->getMessage()], 500);
		}        
    }
    
    public function updateTask($data, $id)
    {
        try {
            $task = $this->task->findOrFail($id);
            $task->name = $data->name;
            $task->save();
            return $task;
        } catch (\Exception $e) {
			return response()->json(['E_API_ERROR' => $e->getMessage()], 500);
		}        
    }

    public function markAsCompleted($data, $id)
    {
        try {
            $task = $this->task->findOrFail($id);
            $task->name = $data->status;
            $task->save();
            return $task;
        } catch (\Exception $e) {
			return response()->json(['E_API_ERROR' => $e->getMessage()], 500);
		}        
    }

    public function deleteTask($id)
    {
        try {
           return $this->task->findOrFail($id)->delete();
        } catch (\Exception $e) {
			return response()->json(['E_API_ERROR' => $e->getMessage()], 500);
		}        
    }    
}
