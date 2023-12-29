<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Viewfile</title>

    <style>
table,tr,td
{
    border:2px solid black;border-collapse:collapse;
}


    </style>
</head>
<body>
<table>
    <tr>
        <td>Id</td>
        <td>Title</td>
        <td>Completed</td>
    </tr>
    @foreach ($data as $item)
   <tr>
      <td>{{ $item->id}} </td>
      <td>{{ $item->title }} </td>
   
        <td>
            @if($item->is_completed == 0)
                Not completed
            @else
                Completed
            @endif
       
         </td>
    
   </tr>

    @endforeach
</table>

</body>
</html>