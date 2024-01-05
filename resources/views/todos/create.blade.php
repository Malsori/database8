<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        svg {
            width:30px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        @if($errors->any)
            @foreach($errors->all as $error)
                <p>{{ $error}}</p>
            @endforeach
        @endif
        <form action="{{ route('todos.store')}}" method="POST">
            {{-- <form method="post"> --}}
            @csrf
            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            <input type="checkbox" name="is_completed" value="1" @if(old('title') == 1) checked @endif>
            <button type="submit" class="btn btn-sm btn-primary">Create</button>
        </form>
    </div>
    
</body>
</html>