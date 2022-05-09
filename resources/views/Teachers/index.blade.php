@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align:center">Teachers List</h1>

                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Role</th>
                        <th scope="col">Control</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($teachers as $teacher)
                        <tr>
                            <th>{{$teacher->id}}</th>
                            <td>{{$teacher->first_name}}</td>
                            <td>{{$teacher->last_name}}</td>
                            <td>{{$teacher->phone_number}}</td>
                            <td>{{$teacher->role}}</td>

                            <td>
                                <a href="{{route('teachers.edit',$teacher->id)}}" class="btn btn-success btn-sm">Edit</a>
                                <a href="/teachers/show/{{$teacher->id}}" class="btn btn-primary btn-sm">show</a>
                                <a class="btn btn-danger btn-sm" href="/teachers/delete/{{$teacher->id}}">Delete</a></td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>








{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
