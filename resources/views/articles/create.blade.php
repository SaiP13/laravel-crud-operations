@extends('articles.layout')


@section('content')
<div style="margin-left: 400px">
    
    <div class="row" style="text-size:10px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ADD NEW</h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('articles.index') }}"> Back</a>
            </div> --}}
        </div>
    </div>


    @if (count($errors) < 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(array('route' => 'articles.store','method'=>'POST')) !!}
         @include('articles.form')
    {!! Form::close() !!}

    </div>
@endsection