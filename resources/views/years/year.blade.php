@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"> <h4>{{ "Year"}}</h4></div>
<table id="table-year" class="table table-bordered table-striped cds-datatables">
<thead>
<tr>
    <th>
        year
    </th>
    <th>Status</th></tr>
    </thead>
    <tbody>
        <tr>
            <td>
                2012
            </td>
            <td>Active</td>
            </tr>
            <tr>
            <td>
                2013
            </td>
            <td>Inactive</td>
        </tr>
    </tbody>

</table>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
   
@endsection