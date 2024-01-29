<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit {{$todo ->title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        svg {
            width:30px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error}}</p>
            @endforeach
        @endif
        <form action="{{ route('todos.update', ['todo' => $todo->id])}}" method="POST">
            @method('PUT')
            @csrf
            <input type="text" name="title" value="{{ $todo->title }}" class="form-control">
            <input type="checkbox" name="completed" value="1" @if($todo->is_completed) checked @endif>
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
        </form>
    </div>
    
</body>
</html>