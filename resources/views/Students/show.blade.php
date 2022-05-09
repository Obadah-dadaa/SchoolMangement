@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <form class="col-md-12">

                <h1 style="text-align:center">Show Student {{$student->first_name}}</h1>

                <form action="/student/update{{$student->id}}" method="post"></form>


                <div class="form-group">
                    <label>First Name</label>
                    <div type="text" name="first_name" class="form-control">{{$student->first_name}}</div>

                </div>


                <div class="form-group">
                    <label>Last Name</label>
                    <div type="text" name="last_name" class="form-control">{{$student->last_name}}</div>

                </div>


                <div class="form-group">
                    <label>Parent Id</label>
                    <div type="Email" name="parent_id" class="form-control">{{$student->parent_id}}</div>
                </div>

                <div class="form-group">
                    <label>Section Id</label>
                    <div type="text" name="section_id" class="form-control">{{$student->section_id}}</div>
                </div>


            </form>

        </div>
    </div>
    </div>

@endsection
