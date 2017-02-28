@extends('layouts.app')

@section('content')
@include('common.errors')
@include('common.flash')

    {!! Form::open(array('url' => 'pgfilter', 'class' => 'form')) !!}
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="container-fluid" style="margin-top:25px">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Peer Group selection by institution attributes</h1>
                    </div>
                    {{--<form action="{{ url('pgfilter/viewpeergroups') }}" method="POST">{{ csrf_field() }}--}}
                        {{--<button type="submit" id="view-peergroups" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>View Peer Groups</button>--}}
                    {{--</form>--}}
                    <div class="panel-body">
                        <div class="row" style="margin-top:5px">

                            <div class="col-md-6">
                                <div class="panel-group" id="accordion">
                                    {{--accordion dropdown EHLbug: may change this style--}}
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">--}}
                                                    Attribute 1: Type</a>
                                                    {{--CCBASIC column in IPEDS, Cng_2010_Basic in schools table--}}
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div>
                                                    <div class="form-group">

                                                        @if(sizeof($selected_attribute1_list) == 0)
                                                            {{ Form::label('attribute1') }}
                                                            {{ Form::select('attribute1', $attribute1_list) }}
                                                        @else
                                                            {{ Form::label('attribute1') }}
                                                            {{ Form::select('attribute1', $attribute1_list, $selected_attribute1_list) }}
                                                        @endif
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                    Attribute 2: State</a>
                                                {{--STABBR column in IPEDS, School_State in schools table--}}
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div>
                                                    <div class="form-group">
                                                        @if(sizeof($selected_attribute2_list) == 0)
                                                            {{ Form::label('attribute2') }}
                                                            {{ Form::select('attribute2', $attribute2_list) }}
                                                        @else
                                                            {{ Form::label('attribute2') }}
                                                            {{ Form::select('attribute2', $attribute2_list, $selected_attribute2_list) }}
                                                        @endif
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                                    Attribute 3: !!Currently unused- need to pull from different table!!</a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    @if(sizeof($selected_attribute3_list) == 0)
                                                        {{ Form::label('attribute3') }}
                                                        {{ Form::select('attribute3', $attribute3_list) }}
                                                    @else
                                                        {{ Form::label('attribute3') }}
                                                        {{ Form::select('attribute3', $attribute3_list, $selected_attribute3_list) }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{--list of schools--}}
                            </div>
                            <div class="col-md-6">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                                (Institution results go here.)
                                            {{Form::select('schools', $results)}}

                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
                        <div class="form-group">
                            {{ Form::submit('View Institutions',
                              array('class'=>'btn btn-primary')) }}
                        </div>
    {{ Form::close() }}
    </div>

@endsection