<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller {
public function index() {
    $tasks = DB::table('tasks')->get();
    return view('tasks', ['tasks' => $tasks]);
}

public function store(Request $request)
{
    // التحقق من صحة البيانات (Validation)
    $request->validate([
        'title' => 'required|max:255',
    ]);

    // استخدام Query Builder لإضافة البيانات
    DB::table('tasks')->insert([
        'title'      => $request->title,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('tasks.index')->with('success', 'تمت إضافة المهمة بنجاح!');
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

