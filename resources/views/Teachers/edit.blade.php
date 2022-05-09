@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <form class="col-md-12">

                <h1 style="text-align:center">Edit Teacher {{$teachers->name}}</h1>

                <form action="/users/update{{$teachers->id}}" method="post"></form>


                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{$teachers->first_name}}">

                </div>



                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{$teachers->last_name}}">

                </div>


                <div class="form-group">
                    <label>Phone_number</label>
                    <input type="text" name="phone_number" class="form-control" value="{{$teachers->phone_number}}">

                </div>





                <div class="form-group">

                    <button class="btn btn-success" type="submit">Update</button>

                </div>
            </form>

        </div>
    </div>
    </div>

@endsection
