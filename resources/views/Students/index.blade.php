@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align:center">Students List</h1>

                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Parent_Id</th>
                        <th scope="col">Section_Id</th>
                        <th scope="col">Control</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($students as $student)
                        <tr>
                            <th>{{$student->id}}</th>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->last_name}}</td>
                            <td>{{$student->parent_id}}</td>
                            <td>{{$student->section_id}}</td>

                            <td>
                                <a href="{{route('students.edit',$student->id)}}" class="btn btn-success btn-sm">Edit</a>
                                <a href="/students/show/{{$student->id}}" class="btn btn-primary btn-sm">show</a>
                                <a class="btn btn-danger btn-sm" href="/students/delete/{{$student->id}}">Delete</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>








            </div>
        </div>
    </div>
@endsection
