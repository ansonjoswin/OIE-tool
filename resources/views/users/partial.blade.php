{{--
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
--}}


<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'E-Mail Address:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6"> 
        {!! Form::text('email', null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('affiliation') ? ' has-error' : '' }}">
    {!! Form::label('affiliation', 'Affiliation:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6"> 

        @if($CRUD_Action == 'Create' )
            {!! Form::select('affiliation',[null=>''] + $affiliation_list, null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!} 
        @else
            {!! Form::select('affiliation', $affiliation_list, $user->affiliation, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!} 
        @endif


        @if ($errors->has('affiliation'))
            <span class="help-block">
                <strong>{{ $errors->first('affiliation') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div class="checkbox" id = "Active">
            <label>
                {{ Form::hidden('active', false) }}{{ Form::checkbox('active', true, old('active')) }} Active
            </label>
        </div>
    </div>
</div>


<div class="form-group" id = "roles" name="roles">
    <label class="col-md-4 control-label" id = "roles" name="roles">Roles</label>
    <div class="col-md-6" id = "roles" name="roles">

        @if($CRUD_Action == 'Create' )  <!--New users have no default role-->
            {!! Form::select('rolelist[]', $list_role, null, ['placeholder' => '', 'class' => 'form-control roles cds-select', 'style' => 'width: 50%; margin-top: 10px;', 'required' => 'required']) !!}
        @elseif($user->getRoleListAttribute()->first() != null) <!--Existing users default to existing role--> 
            {!! Form::select('rolelist[]', $list_role, $user->getRoleListAttribute()->first(), ['class' => 'form-control roles cds-select', 'style' => 'width: 50%; margin-top: 10px;', 'required' => 'required']) !!}
        @else <!--If user has no role, it is a Registered User-->
            {!! Form::select('rolelist[]', $list_role, $list_role->search('Registered User'), ['class' => 'form-control roles cds-select', 'style' => 'width: 50%; margin-top: 10px;', 'required' => 'required']) !!}
        @endif
    </div>
</div>


@if($CRUD_Action == 'Create' )

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password">
            @if ($errors->has('password'))
                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Confirm Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
            @endif
        </div>
    </div>
@endif

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::button('<i class="fa fa-btn fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
    </div>
</div>
