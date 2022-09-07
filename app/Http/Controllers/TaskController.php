<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Task;


class TaskController extends Controller
{
    public function index() {
        return Inertia::render('TaskPage', [
            'tasks' => Task::where('user_id', auth()->user()->id)->select('id','name','description','completed')->get()
        ]);
    }
    public function statusUpdate(Request $request) {

        Task::where('id',$request->id)->update(['completed' => $request->completed]);
        return redirect()->back();
    }
}
