<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Tasks::all();
        return view('task.list', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function view($id)
    {
        $task = Tasks::findOrFail($id);
        return view('task.view', compact('task'));
    }

    public function store(TaskRequest $request)
    {
        $task = new Tasks();
        $task->title = $request->input('title');
        $task->content = $request->input('content');
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = $request->image;

                $clientName = $image->getClientOriginalName();
                $path = $image->move(public_path('upload/images/'), $clientName);
                $task->image = $clientName;
            }
        }
        $task->due_date = $request->input('due_date');
        $task->save();

        Session::flash('success', 'Tao moi thanh cong');
        return redirect(route('task.index'));
    }

    public function update(TaskRequest $request, $id)
    {
        $task = Tasks::findOrFail($id);
        $task->title = $request->input('title');
        $task->content = $request->input('content');
        if ($request->hasFile('image')) {
            $currentImg = $task->image;
            if ($currentImg) {
                Storage::delete('upload/images/', $currentImg);
            }
            $image = $request->image;
            $clientName = $image->getClientOriginalName();
            $path = $image->move(public_path('upload/images', $clientName));
            $task->image = $clientName;
        }
        $task->due_date = $request->input('due_date');
        $task->save();

        Session::flash('success', 'Cap nhat thanh cong');
        return redirect(route('task.index'));
    }

    public function edit($id)
    {
        $task = Tasks::findOrFail($id);
        return view('task.edit', compact('task'));
    }

    public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();

        return redirect(route('task.index'));
    }


}
