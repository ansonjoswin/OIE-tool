<div class="form-group{{ $errors->has('PeerGroupName') ? ' has-error' : '' }}">
    {!! Form::label('PeerGroupName', 'Peer Group Name:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('PeerGroupName', null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
        @if ($errors->has('PeerGroupName'))
            <span class="help-block">
                <strong>{{ $errors->first('PeerGroupName') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('PriPubFlg') ? ' has-error' : '' }}">
    {!! Form::label('PriPubFlg', 'Private/Public:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">

        @if($CRUD_Action == 'Create' )
            {!! Form::select('PriPubFlg',[null=>''] + $PriPubFlgList, null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
        @else
            {!! Form::select('PriPubFlg', $PriPubFlgList, $peergroup->PriPubFlg, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
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
            {!! Form::select('schoollist[]', $list_school->pluck('School_Name'), null, ['class' => 'form-control roles cds-select', 'multiple', 'style' => 'width: 50%; margin-top: 10px;', 'required' => 'required']) !!}
        @else
            {!! Form::select('schoollist[]', $list_school->pluck('School_Name'), null, ['class' => 'form-control roles cds-select', 'multiple', 'style' => 'width: 50%; margin-top: 10px;']) !!}
        @endif

        {{--//EHLbug: (SQL: select * from `school_peergroups` where `school_peergroups`.`peer_group_PeerGroupID` = 4 and `school_peergroups`.`peer_group_PeerGroupID` is not null)--}}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::button('<i class="fa fa-btn fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
    </div>
</div>
