@extends('layouts.main')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Student</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/student') }}">
                        {{ csrf_field() }}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="program" class="col-md-4 control-label">program Study</label>
                            <div class="col-md-6">
                                <select name="program_study_id" id="program" class="form-control">
                                    <option value="">-</option>
                                    @foreach ($program_studies as $program)
                                        <option value="{{$program->id}}">{{$program->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Phone</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control" name="address">{{ old('address') }} </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="program" class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label><input type="radio" name="gender" value="1">Male</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="gender" value="0">Famale</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection