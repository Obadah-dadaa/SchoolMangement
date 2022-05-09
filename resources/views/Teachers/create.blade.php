@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Add Teacher</h1>
        <form method="POST" action="{{ route('teachers.store') }}" >
            @csrf

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" placeholder="Enter first name" id="first_name" name="first_name">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" placeholder="Enter last name" id="last_name" name="last_name">
            </div>



            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter the phone number" id="phone_number" name="phone_number">
            </div>



            <div class="form-group">
                <label for="role_id">Role</label>
                <select class="form-control" name="type_id">

                    @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->role}}</option>

                    @endforeach

                </select>
            </div>


            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
