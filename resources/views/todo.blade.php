@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      {{'Hello, ' . Auth::user()->name}}
      <form action="{{url('admin/todolist')}}" method="POST">
        @csrf
        <input type="text" name="task" placeholder="New to do">
        <button type="submit">Submit</button>
      </form>

      <br>

      <ol>
        @foreach($todos as $todo)
        <li>
          {{ $todo->task }}
          [
          <a href="{{url('admin/todolist/edit') . '/' . $todo->id}}">edit</a> |
          <a href="{{url('admin/todolist/delete/') . '/' . $todo->id}}">delete</a>
          ]
        </li>
        @endforeach
      </ol>
    </div>
  </div>
</div>

@endsection