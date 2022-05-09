@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <form class="col-md-12">

                <h1 style="text-align:center">Edit Admin {{$user->name}}</h1>

    <form action="/users/update{{$user->id}}" method="post"></form>


        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}">

        </div>


                <div class="form-group">
                    <label>Email</label>
                    <input type="Email" name="Email" class="form-control" value="{{$user->email}}">
                </div>


                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="Password" class="form-control" value="{{$user->password}}">
                </div>


<div class="form-group">

    <button class="btn btn-success" type="submit">Update</button>

</div>
            </form>

            </div>
        </div>
    </div>

@endsection
