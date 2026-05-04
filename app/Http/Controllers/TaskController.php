<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create($validated);

        return response()->json(['message' => 'Task berhasil ditambah!'], 201);
    }
}