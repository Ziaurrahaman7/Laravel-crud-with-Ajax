<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <form action="{{url('profile')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name"> <br><br>
    <input type="email" name="email"> <br><br>
    <input type="file" name="image"> <br><br>
    <button>Submit</button>
</form> 
<table>
    <tr>
        <td>name</td>
        <td>email</td>
        <td>image</td>
    </tr>
    @foreach ( $users as $user )
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><img src="{{asset('public/'.$user->image)}}" alt=""></td>
    </tr> 
    @endforeach

</table>
</body>
</html>