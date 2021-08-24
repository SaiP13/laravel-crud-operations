@extends('layouts.app')
@section('title','addUser')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if (isset($userData))
                <div class="panel-heading">Edit User</div>
                @else
                <div class="panel-heading">Add New User</div>
                @endif
               

                <div class="panel-body">
                    {!! Form::open(['role' => 'form', 'route' => isset($userData->id)?["updateUser",$userData->id]:'addNewUser', 'class' => 'form-horizontal']) !!}
                    {{-- <form class="form-horizontal" method="POST" action="{{ route('addNewUser') }}"> --}}
                        {{ csrf_field() }}

                        <div class="form-group">
                            {{-- <label for="name" class="col-md-4 control-label">Name</label> --}}
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{-- <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> --}}
                                {!! Form::text('name', $value = isset($userData) ? $userData->name : null, ['class' => 'form-control','id' => 'name', 'required' , 'autofocus']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> --}}
                            {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required> --}}
                                {!! Form::email('email', $value = isset($userData) ? $userData->email : null, ['class' => 'form-control','id' => 'email', 'required']) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if (!isset($userData))
                        
                        <div class="form-group">
                            {{-- <label for="password" class="col-md-4 control-label">Password</label> --}}
                            {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required />
                                {{-- {!! Form::password('password', null, ['class'=>'form-control','id' => 'password', 'required']) !!} --}}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label> --}}
                            {!! Form::label('password-confirm', 'Confirm Password', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            {{-- {!! Form::password('password', null, ['class'=>'form-control','id' => 'password', 'required']) !!} --}}
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <a href="{{ route('users') }}" class="btn btn-danger">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
