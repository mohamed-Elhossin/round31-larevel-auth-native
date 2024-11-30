@extends('layouts.app')





@section('content')
    <div class="container col-md-7">
        <div class="card">
            <h6 class=" my-3"> Welcome At Index Employees Page
                <a class="btn btn-info float-end" href="{{ route('employee.create') }}"> Create New </a>
            </h6>
            @if (Session::has('done'))
                <div class="alert alert-success">
                    {{ Session::get('done') }}
                </div>
            @endif
            <div class="card-body">
                <table class="table table-dark">
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Departments</th>
                        <th colspan="3">Action</th>
                    </tr>
                    @foreach ($employees as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->name }}</th>
                            <th>{{ $item->salary }}</th>
                            <th>{{ $item->department->name }}</th>
                            <th> <a class="text-danger" href="{{ route('employee.destroy', $item->id) }}">Delete</a> </th>
                            <th> <a class="text-primary" href="{{ route('employee.show', $item->id) }}">Show</a> </th>
                            <th> <a class="text-warning" href="{{ route('employee.edit', $item->id) }}">Edit</a> </th>

                        </tr>
                    @endforeach
                </table>
                {{ $employees->links('pagination::simple-bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
