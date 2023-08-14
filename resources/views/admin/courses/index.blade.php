<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Courses</title>
    </head>
    <body>
        <div class="container">
            <div>
                @foreach ($courses as $course)
                    <p>Course Name : {{$course->name}}</p>
                    <p>Course Price : {{$course->price}}</p>
                    @if (Auth::user()->hasRole('student'))
                    <form action="{{ route('orders.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <input type="hidden" name="course_price" value="{{$course->price}}">
                        <button>Buy</button>
                    </form>

                        @else
                            <a href="{{route('courses.edit',$course->id)}}">Edit</a>
                            <form action="{{route('courses.destroy',$course->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button>Delet</button>
                            </form>
                        @endif
                    
                    
                    <hr>
                @endforeach
            </div>
            <div></div>
            <div></div>
        </div> 
    </body>
</html>