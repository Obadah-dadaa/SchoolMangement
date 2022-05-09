@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <form class="col-md-12">

                <h1 style="text-align:center">Show Admin {{$user->name}}</h1>

                <form action="/users/update{{$user->id}}" method="post"></form>


                <div class="form-group">
                    <label>Name</label>
                    <div type="text" name="name" class="form-control">{{$user->name}}</div>

                </div>


                <div class="form-group">
                    <label>Email</label>
                    <div type="Email" name="Email" class="form-control">{{$user->email}}</div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div type="text" name="Password" class="form-control">{{$user->password}}"</div>
                </div>


            </form>

        </div>
    </div>
    </div>

@endsection
