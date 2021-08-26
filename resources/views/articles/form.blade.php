
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-8">
        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
            <strong>Title:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong style="color:red">{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-8">
        <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
            <strong>Description:</strong>
            {!! Form::textarea('body', null, array('placeholder' => 'Body','class' => 'form-control','style'=>'height:150px')) !!}
            @if ($errors->has('body'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('body') }}</strong>
            </span>
        @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-8 text-center">
            <button type="submit" class="btn btn-primary">Submit</button> 
            <a class="btn btn-danger" href="{{ route('articles.index') }}"> Back</a>
    </div>
</div>
