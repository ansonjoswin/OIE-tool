<div class="form-group{{ $errors->has('school_name') ? ' has-error' : '' }}">
    {!! Form::label('school_name', 'Name:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('school_name', null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
        @if ($errors->has('school_name'))
            <span class="help-block"><strong>{{ $errors->first('school_name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('school_city') ? ' has-error' : '' }}">
    {!! Form::label('school_city', 'City:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('school_city', null, ['class' => 'col-md-6 form-control']) !!}
        @if ($errors->has('school_city'))
            <span class="help-block"><strong>{{ $errors->first('school_city') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('school_state') ? ' has-error' : '' }}">
    {!! Form::label('school_state', 'State:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('school_state', null, ['class' => 'col-md-6 form-control']) !!}
        @if ($errors->has('school_state'))
            <span class="help-block"><strong>{{ $errors->first('school_state') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::button('<i class="fa fa-btn fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
    </div>
</div>