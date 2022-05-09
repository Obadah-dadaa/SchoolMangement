@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <form class="col-md-12">

                <h1 style="text-align:center">Show Teacher {{$teacher->name}}</h1>

                <form action="/users/update{{$teacher->id}}" method="post"></form>

                <div class="form-group">
                    <label>First Name</label>
                    <div type="text" name="first_name" class="form-control">{{$teacher->first_name}}</div>

                </div>


                <div class="form-group">
                    <label>Last Name</label>
                    <div type="text" name="last_name" class="form-control">{{$teacher->last_name}}</div>

                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <div type="text" name="phone_number" class="form-control">{{$teacher->phone_number}}</div>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <div type="text" name="role" class="form-control">{{$teacher->role}}</div>
                </div>

            </form>

        </div>
    </div>
    </div>

@endsection
