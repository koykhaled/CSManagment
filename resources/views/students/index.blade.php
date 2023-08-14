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
                    <form action="{{ route('orders.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <input type="hidden" name="course_price" value="{{$course->price}}">
                        <button>Buy</button>
                    </form>
                    <hr>
                @endforeach
            </div>
            <div></div>
            <div><form method="POST" action="{{ route('logout') }}">
                @csrf
            
                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form></div>
        </div> 
    </body>
</html>