<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
        }
        form {
            display: flex;
            gap: 10px;
        }
        input[type="text"] {
            flex: 1;
            padding: 8px;
        }
        button {
            padding: 8px 12px;
            cursor: pointer;
        }
        ul {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }
        li {
            display: flex;
            justify-content: space-between;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📝 Todo List</h2>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Enter new todo">
        <button type="submit">Add</button>
        {{-- <input type="checkbox" name="completed" value="1"> Completed --}}
    </form>

    <ul>
        @foreach ($todos as $todo)
            <li>

                {{-- <input type="checkbox" {{ $todo->completed ? 'checked' : '' }}> --}}
                
                <span>{{ $todo->title }}</span>
                <span>{{$todo->created_at->diffForHumans()}}</span>
                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">❌</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

</body>
</html>
