<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit page</title>
</head>
<body>
    @if($errors->any())
    @foreach($errors->all() as $error)
        <p>{{ $error}}</p>
    @endforeach
@endif
    <form method="POST" action="{{ route('update', ['id' => $todo->id]) }}">
        @csrf
        @method('PUT')
        {{-- <input type="text" name="id" value="{{ $todo->id }}"> --}}
        <label for="title">Title:</label>
        <input type="text"id="title" name="title" value="{{ $todo->title }}">
        <br>
        <label for="is_completed">Status:</label>
        <input type="checkbox" id="is_completed" name="is_completed" {{ $todo->is_completed ? 'checked' : '' }}>
        
     
        <button type="submit">Update</button><br>
        <a href="{{ route('index')}}">Go back</a>
    </form>
    
</body>
</html>