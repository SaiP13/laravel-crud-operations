@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
<script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password"  type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" id="addUser" class="btn btn-primary">
                                    Register
                                </button>
                                <a class="btn btn-danger" href="{{ url('/') }}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        
        $('#addUser').on('click',function(){
            var error_vals = "";
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            
            if(name == ''){
		        error_vals	+=	"Name should not be empty \n";
            }
            if(email == ''){
		        error_vals	+=	"Email should not be empty \n";
            }
            if(password == ''){
		        error_vals	+=	"Password should not be empty \n";
            }
            if(error_vals != ""){
               
                //swal({title: "Error",text: error_vals,type: "error",});
                swal({
                    type: 'error',
                    title: 'Error',
                    text: error_vals,
                    footer: '<a href="">Why do I have this issue?</a>'
                })
			    return false;
                //alert('Name should have  value')
            } else{
                return true;
            }
        }); 
         

    });
</script>
@endsection
