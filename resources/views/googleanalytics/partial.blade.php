                        

                                @if (count($schools) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped cds-datatable">
                                            <thead> <!-- Table Headings -->
                                                <th>ID</th>
                                                <th>Unit ID</th>
                                                <th>Name</th>
                                            </thead>
                                            <tbody> <!-- Table Body -->                                
                                            @foreach ($schools as $school)
                                                    <tr>
                                                        <td class="table-text">{{ $school->School_Id }}</td>
                                                        <td class="table-text">{{ $school->Unit_Id }}</td>
                                                        <td class="table-text">{{ $school->School_Name }}</td>
                                                    </tr>        
                                            @endforeach  
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="panel-body"><h4>No Institutions Found</h4></div>
                                @endif 
          



