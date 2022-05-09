@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Add Student</h1>
        <form action="/students/store" method="POST">
            @csrf


            <div class="form-group">
                <label for="parent_id ">Parent_id</label>
                <input type="text" class="form-control" placeholder="Enter parent id" id="parent_id" name="parent_id">
            </div>


            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" placeholder="Enter first name" id="first_name" name="first_name">
            </div>


            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" placeholder="Enter last name" id="last_name" name="last_name">
            </div>


            <div class="form-group">
                <label for="section_id">Section</label>
                <select class="form-control" name="section_id">

                    @foreach($sections as $section)
                        <option value="{{$section->grade_id}}">{{$section->id}}</option>
                    @endforeach

                </select>
            </div>


            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
