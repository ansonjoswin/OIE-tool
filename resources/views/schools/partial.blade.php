                        @if (count($schools) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <th>ID</th><th>Unit_ID</th><th>Name</th><th>State</th><th>Actions</th>
                                </thead>
                                <tbody> <!-- Table Body -->

                                @foreach ($schools as $school)
                                    <tr>
                                        <td class="table-text">{{ $school->id}} </td>
                                        <td class="table-text">{{ $school->unitid}} </td>
                                        <td class="table-text">{{ $school->name}} </td>
                                        <td class="table-text">{{ $school->state}} </td>
                                        <td class="table-text"> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <div class="panel-body"><h4>No Institutions Found</h4></div>
                        @endif