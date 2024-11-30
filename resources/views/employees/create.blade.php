@extends('layouts.app')



@section('content')
    <h4 class="text-center my-3"> Welcome At Create Employees Page </h4>

    <div class="container col-md-6">
        <form method="POST" action="{{ route('employee.store') }}">
            @csrf
            <div class="card">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
       

                <!-- Create Post Form -->
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> User Name </label>
                        <input type="text" name="name"
                            class="  form-control">

                    </div>
                    <div class="form-group">
                        <label for=""> Salary</label>
                        <input type="text" name="salary" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""> Department_ID</label>
                        <select type="text" name="dep_id" class="form-control">
                            <option disabled selected>Select Departments</option>
                            @foreach ($departments as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-info"> Create New</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

