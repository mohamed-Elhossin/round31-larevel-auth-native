@extends('layouts.app')





@section('content')
    <div class="container col-md-7">
        <div class="card">
            <h6 class=" my-3"> List {{ $employee->id }}
                <a class="btn btn-info float-end" href="{{ route('employee.create') }}"> Create New </a>
            </h6>

            <div class="card-body">
                <h6> name : {{ $employee->name }}</h6>
                <hr>
                <h6> salary : {{ $employee->salary }}</h6>
                <hr>
                <h6> department : {{ $employee->department->name }}</h6>
                <hr>
            
            </div>
        </div>
    </div>
@endsection
