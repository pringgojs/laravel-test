@extends('layouts.main')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Program Study
                    <a href="{{url('program-study/create')}}" class="pull-right">+ Add New</a>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($program_studies as $program)
                            <tr>
                                <td>{{$program->name}}</td>
                                <td>
                                    <form action="{{url('program-study/'.$program->id)}}" method="post">
                                        {!! csrf_field() !!}
                                        <a href="{{url('program-study/'.$program->id.'/edit')}}">Edit</a>
                                        <a href="#" onclick="$('#submit-{{$program->id}}').click();">Delete</a>
                                        <input type="hidden" name="_method" value="delete" />
                                        <button class="hidden" id="submit-{{$program->id}}"></button>
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