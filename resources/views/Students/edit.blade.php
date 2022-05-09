@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <form class="col-md-12">

                <h1 style="text-align:center">Edit Student {{$students->name}}</h1>

                <form action="/students/update{{$students->id}}" method="post"></form>


                <div class="form-group">
                    <label>Parent_id</label>
                    <input type="text" name="parent_id" class="form-control" value="{{$students->parent_id}}">

                </div>



                <div class="form-group">
                    <label>section_id</label>
                    <input type="text" name="section_id" class="form-control" value="{{$students->section_id}}">

                </div>


                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{$students->first_name}}">

                </div>



                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{$students->last_name}}">

                </div>







                <div class="form-group">

                    <button class="btn btn-success" type="submit">Update</button>

                </div>
            </form>

        </div>
    </div>
    </div>

@endsection
