@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center"><h4>Discussions</h4></div>


                <div class="panel-body">
                    @include('common.flash')
                    @if (count($comments) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead>
                                <!-- Table Headings -->
                                <tr class="bg-info">
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                <!-- Table Body -->

                                @foreach ($comments as $comment)
                                    <tr>

                                        <td>{{$comment->id}}</td>
                                        <td>{{$comment->email}}</td>
                                        <td>{{$comment->comment_text}}</td>
                                        <td>


                                            @if($comment->is_active == 1)
                                                {!! Form::model($comment,['method' => 'PATCH','route'=>['usercomments.update',$comment->id]]) !!}

                                                <input type="hidden" name="is_active" value="0">
                                                <div class="form-group">
                                                    <button class="btn btn-primary">Unpublish</button>
                                                </div>
                                                {!!Form::close()!!}
                                            @else
                                                {!! Form::model($comment,['method' => 'PATCH','route'=>['usercomments.update',$comment->id]]) !!}

                                                <input type="hidden" name="is_active" value="1">
                                                <div class="form-group">
                                                    <button class="btn btn-success" style="padding: 6px 22px 6px 22px">
                                                        Publish
                                                    </button>
                                                </div>
                                                {!!Form::close()!!}

                                            @endif
                                        </td>


                                        <td>

                                            <form action="{{ url('usercomments/'.$comment->id) }}" method="POST"
                                                  onsubmit="return ConfirmDelete();">{{ csrf_field() }}{{ method_field('DELETE') }}
                                                <button type="submit" id="delete" class="btn btn-default btn-danger"><i
                                                            class="fa fa-btn fa-trash"></i></button>
                                            </form>
                                        </td>


                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="panel-body"><h4>No Comments found</h4></div>
                    @endif
                </div>
            </div>
        </div>
    </div>




@endsection

@section('footer')
    <style>
        .table td {
            border: 0px !important;
        }

        .tooltip-inner {
            white-space: pre-wrap;
            max-width: 400px;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('table.cds-datatable').on('draw.dt', function () {
                $('tr').tooltip({html: true, placement: 'auto'});
            });

            $('tr').tooltip({html: true, placement: 'auto'});
        });
    </script>
@endsection
















