@extends('articles.layout')


@section('content')
<div style="margin-left: 400px">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Article</h2>
            </div>
            {{-- <div class="pull-right">
                
            </div> --}}
        </div>
    </div>

    <br><br>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    {!! Form::model($article, ['method' => 'PATCH','route' => ['articles.update', $article->id]]) !!}
        @include('articles.form')
    {!! Form::close() !!}
  
</div>

@endsection