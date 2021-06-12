<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = DB::table('todos')->orderBy('updated_at', 'desc')->get();
        return view('todo', ['todos' => $todos]);
    }

    public function submit(Request $request)
    {
        // $time = date('Y-m-d H:i:s');
        // DB::table('todos')->insert([
        //     'task'=> $request->task, 
        //     'created_at'=>$time, 
        //     'updated_at'=>$time
        // ]);

        // $todo = new Todo();
        // $todo->task = $request;
        // $todo->save();

        Todo::create([
            'task' => $request->task
        ]);

        return redirect(url('/admin/todolist'));
    }

    public function delete($id)
    {
        // DB::table('todos')->delete($id);
        Todo::find($id)->delete();
        return redirect(url('/admin/todolist'));
    }

    public function parseData($id)
    {
        $todo = DB::table('todos')->where('id', $id)->get()[0];
        // dd($todo);
        return view('edit', ['todo' => $todo]);
    }

    public function edit(Request $request)
    {
        // $time = date('Y-m-d H:i:s');
        // DB::table('todos')->where('id', $request->id)->update([
        //     'task'=> $request->task, 
        //     'updated_at'=>$time]);

        // $todo = Todo::where('id', $request->id)->first();
        $todo = Todo::findOrFail($request->id);
        $todo->task = $request->task;
        $todo->save();
        return redirect(url('admin/todolist'));
    }
}
