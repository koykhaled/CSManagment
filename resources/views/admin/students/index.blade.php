<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Student</title>
    </head>
    <body>
        <div class="container">
            <div>
                @foreach ($students as $student)
                    <p>{{$student->id}}-Student Name : {{$student->name}}</p>
                    <p>Email : {{$student->email}}</p>
                    <p>Email : {{$student->password}}</p>
                             {{-- <a href="{{route('courses.edit',$course->id)}}">Edit</a>
                            <form action="{{route('courses.destroy',$course->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button>Delet</button>
                            </form>  --}}
                    <hr>
                @endforeach
            </div>
            <div></div>
            <div></div>
        </div> 
    </body>
</html>