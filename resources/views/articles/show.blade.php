@extends('articles.layout')


@section('content')
<div style="margin-left: 400px">
    <div class="row">
        <div class="col-lg-12 margin-tb" style="color:#2dda0b">
            <div class="pull-left">
                <h3> Show Article</h3>
            </div>
            
        </div>
    </div>

<br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title : </strong>
                {{ $article->title}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description : </strong>
                {{ $article->body}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <a class="btn btn-primary" href="{{ route('articles.index') }}"> Back</a>
        </div>
    </div>
</div>
@endsection