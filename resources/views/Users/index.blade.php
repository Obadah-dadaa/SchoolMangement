@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align:center">Users List</h1>

                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Control</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <th>{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                            @foreach($users as $user)
                             @foreach($user->roles as $role)
                                {{$role->name}}
                            @endforeach
                            @endforeach
                            </td>
                            <td>
                            <a href="/users/edit/{{$user->id}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="/users/show/{{$user->id}}" class="btn btn-primary btn-sm">show</a>
                            <a class="btn btn-danger btn-sm" href="/users/delete/{{$user->id}}">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>








            </div>
        </div>
    </div>
@endsection
