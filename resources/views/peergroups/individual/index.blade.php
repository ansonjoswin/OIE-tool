@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                          <h4>{{ $heading }}</h4>
                          <div class="row">
                            <div class="col-md-10">
                              <div class="panel-default"> 
                                    <div>
                                    {!! Form::open(array('route'=>'pg_edit_url', 'class'=>'form')) !!}
                                    {!! Form::select('institutionList[]', $schools, $schools, ['class'=>'form-control cds-select', 'multiple', 'required'=>'required']) !!}  
                                    {!! Form::button('<i class="fa fa-btn fa-save"></i>Save As', ['type'=>'submit', 'class'=>'btn btn-primary']) !!} 
                                    {{--
                                    {!! Form::button('<i class="fa fa-btn fa-plus"></i>Add', ['type'=>'submit', 'class'=>'btn btn-primary']) !!} 
                                    --}}
                                    {!! Form::close() !!}
                                    </div>
                              </div>
                            </div>                             
                            <div class="col-md-2 pull-right">
                              <div class="panel-default pull-right">
                                    <form action="{{ url('users/create') }}" method="GET">{{ csrf_field() }}
                                        <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-forward"></i>Next</button>
                                    </form> 
                              </div>
                            </div> 
                          </div>                 
                    </div>                

                     <div class="panel-body">
                        @include('common.flash')
                        @if (count($schools) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped ">
                                    <thead> <!-- Table Headings -->
                                    <th> </th>
                                    <th>Institution Name</th>
                                    <th> </th>
                                    </thead>
                                    <tbody> <!-- Table Body -->
                                    @foreach ($schools as $school)
                                        <tr>
                                            <td class="table-text"><div>{{ $school['unit_id'] }}</div></td>
                                            <td class="table-text"><div>{{ $school['school_name'] }}</div></td>
                                            <td class="table-text">
                                                <div>
                                                <form action="{{ url('users/'.$school) }}" method="POST">
                                                {{ csrf_field() }}{{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button> 
                                                </form>
                                                </div>  
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="panel-body"><h4>No Institutions for this Peer Group</h4></div>
                        @endif
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection