<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="{{ url( 'admin/todolist/edit/') . '/' . $todo->id}}" method="POST">
    @csrf
    <input type="text" name="task" value="{{ $todo->task }}">
    <button type="submit">Submit</button>
  </form>
</body>

</html>