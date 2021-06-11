<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function index(){
        $todos = DB::table('todos')->orderBy('updated_at', 'desc')->get();
        return view('todo', ["todos" => $todos]);
    }

    public function submit(Request $request){
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

        return redirect(url('todolist'));
    }

    public function delete($id){
        // DB::table('todos')->delete($id);
        Todo::find($id)->delete();
        return redirect(url('todolist'));
    }

    public function parseData($id){
        $data = DB::table('todos')->where('id', $id)->get();
        return view('edit', ["data" => $data[0]]);
    }

    public function edit(Request $request){
        // $time = date('Y-m-d H:i:s');
        // DB::table('todos')->where('id', $request->id)->update([
        //     'task'=> $request->task, 
        //     'updated_at'=>$time]);

        // $todo = Todo::where('id', $request->id)->first();
        $todo = Todo::findOrFail($request->id);
        $todo->task = $request->task;
        return redirect(url('todolist'));
    }
}
