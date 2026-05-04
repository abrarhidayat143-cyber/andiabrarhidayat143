<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Fitur READ [GET] - Menampilkan semua tugas
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    // Fitur CREATE [POST] - Menambah tugas baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = Task::create($validated);

        return response()->json([
            'message' => 'Task berhasil ditambah!',
            'data' => $task
        ], 201);
    }

    // Fitur DELETE [DELETE] - Menghapus tugas
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task berhasil dihapus!']);
    }
}