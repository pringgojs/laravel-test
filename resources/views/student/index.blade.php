@extends('layouts.main')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Student
                    <a href="{{url('student/create')}}" class="pull-right">+ Add New</a>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Program Study</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->gender ? 'Male': 'Famale'}}</td>
                                <td>{{$student->address}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->programStudy->name}}</td>
                                <td>
                                    <form action="{{url('student/'.$student->id)}}" method="post">
                                        {!! csrf_field() !!}
                                        <a href="{{url('student/'.$student->id.'/edit')}}">Edit</a>
                                        <a href="#" onclick="$('#submit-{{$student->id}}').click();">Delete</a>
                                        <input type="hidden" name="_method" value="delete" />
                                        <button class="hidden" id="submit-{{$student->id}}"></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection