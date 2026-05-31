<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {
    public function index() {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function store(Request $request) {
        $request->validate(['title' => 'required|max:255']);
        Task::create(['title' => $request->title]);
        return back()->with('success', 'تمت إضافة المهمة!');
    }

    public function destroy(Task $task) {
        $task->delete();
        return back()->with('success', 'تم حذف المهمة!');
    }

public function update(Request $request, $id)
{
    $task = \App\Models\Task::findOrFail($id);
    $request->validate(['title' => 'required']);
    $task->update(['title' => $request->title]);
    return back();
}
}

