<div class="form-group{{ $errors->has('peergroup_name') ? ' has-error' : '' }}">
    {!! Form::label('peergroup_name', 'Peer Group Name:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('peergroup_name', null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
        @if ($errors->has('peergroup_name'))
            <span class="help-block">
                <strong>{{ $errors->first('peergroup_name') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('private_public_flag') ? ' has-error' : '' }}">
    {!! Form::label('private_public_flag', 'Private/Public:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">

        @if($CRUD_Action == 'Create' )
            {!! Form::select('private_public_flag',[null=>''] + $PriPubFlgList, null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
        @else
            {!! Form::select('private_public_flag', $PriPubFlgList, $peergroup->private_public_flag, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
        @endif


        @if ($errors->has('PriPubFlgList'))
            <span class="help-block">
                <strong>{{ $errors->first('PriPubFlgList') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Institutions: ({{ count($list_school) }})</label>
    <div class="col-md-6">
        @if($CRUD_Action == 'Create' )
            {!! Form::select('schoollist[]', $list_school->pluck('name'), null, ['class' => 'form-control roles cds-select', 'multiple', 'style' => 'width: 50%; margin-top: 10px;', 'required' => 'required']) !!}
        @else
            {!! Form::select('schoollist[]', $list_school->pluck('name'), null, ['class' => 'form-control roles cds-select', 'multiple', 'style' => 'width: 50%; margin-top: 10px;']) !!}
        @endif

        {{--//EHLbug: (SQL: select * from `school_peergroups` where `school_peergroups`.`peer_group_PeerGroupID` = 4 and `school_peergroups`.`peer_group_PeerGroupID` is not null)--}}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::button('<i class="fa fa-btn fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
    </div>
</div>
