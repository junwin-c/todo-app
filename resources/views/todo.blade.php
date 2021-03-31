<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/CSS/style.css">
  <title>Home</title>
</head>
<body>
  <form action="{{url('todolist')}}" method="POST">
    @csrf
    <input type="text" name="task" placeholder="New to do">
    <button type="submit">Submit</button>
  </form>

  <br>

  <ol>
    @foreach($todos as $todo)
      <li>
        {{ $todo->task }}
        <a href="{{url('todolist/edit') . '/' . $todo->id}}">edit</a>
        <a href="{{url('todolist') . '/' . $todo->id}}">delete</a>
      </li>
    @endforeach
  </ol>
</body>
</html>