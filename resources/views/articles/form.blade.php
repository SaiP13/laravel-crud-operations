
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-8">
        <div class="form-group">
            <strong>Title:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-8">
        <div class="form-group">
            <strong>Description:</strong>
            {!! Form::textarea('body', null, array('placeholder' => 'Body','class' => 'form-control','style'=>'height:150px')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-8 text-center">
            <button type="submit" class="btn btn-primary">Submit</button> 
            <a class="btn btn-danger" href="{{ route('articles.index') }}"> Back</a>
    </div>
</div>
