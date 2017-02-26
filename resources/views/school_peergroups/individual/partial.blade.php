
                        @if (count($school_peergroups) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped ">
                                    <thead> <!-- Table Headings -->
                                    <th> </th>
                                    <th>Institution Name</th>
                                    <th> </th>
                                    </thead>
                                    <tbody> <!-- Table Body -->
                                    @foreach ($school_peergroups as $school)
                                        <tr>
                                            <td class="table-text"><div>{{ $school->Unit_ID }}</div></td>
                                            <td class="table-text"><div>{{ $school->School_ID}}</div></td>
                                            <td class="table-text"><div>{{ $school->School_Name }}</div></td>
                                            <td class="table-text">
                                                <div>
                                                {!! Form::open(['method' => 'DELETE', 'route'=>['school_peergroups.destroy', $school_peergroups->SchoolPeerGroupID, $school->Unit_ID ]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
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






