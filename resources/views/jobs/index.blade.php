@extends('layouts.app')

@section('content')
    <h1>Scheduled Jobs</h1>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>ID</th>
            <th>Job Name</th>
            <th>Scheduled At</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->payload }}</td>
                <td>{{ $job->created_at }}</td>
                <td>{{ $job->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('footer')

@endsection