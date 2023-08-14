<h1>Course Edit</h1>
@error('name')
<small>{{$message}}</small>

@enderror
<form action="{{ route('courses.update',$course->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$course->name}}" readonly>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="new_price" id="price" class="form-control" value="{{$course->price}}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

</form>