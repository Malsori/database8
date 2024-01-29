<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show {{$todo ->title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        svg {
            width:30px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Status</td>
                </tr>
                <tr>
                    <td>{{ $todo ->id }}</td>
                    <td>{{ $todo->title }}</td>
                    <td>
                        @if($todo->completed)
                            <span class="badge badge-sm bg-success">Completed</span>
                        @else
                            <span class="badge badge-sm bg-info">Open</span>
                        @endif
                    </td>
                </tr>
            </table>
    </div> 
</body>
</html>