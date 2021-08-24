@extends('layouts.app')
{{-- @extends('articles.layout') --}}
@section('title','home')  
@section('content')
   {{-- <div style="margin-left: 10%;margin-right:10%;margin-top:5%;color:rgb(243, 17, 17)" > --}}
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
    <div class="row" style="margin-bottom: 20px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a href="{{ url('/') }}"> HOME </a>| ARTICLES
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}">Add New</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th width="210px">Action</th>
        </tr>
    @foreach ($articles as $article)
    
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ ucfirst($article->title)}}</td>
        <td>{{ ucfirst($article->body) }}</td>
        <td width="120px">{{ date("d-M-Y h:m a",strtotime($article->created_at)) }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('articles.show',$article->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    <div style="float:left">
        {!! $articles->links() !!}
    </div>
   </div>
            </div></div></div>
@endsection