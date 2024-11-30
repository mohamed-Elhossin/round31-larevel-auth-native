@extends('layouts.app')



@section('content')

    <h4 class="text-center my-3"> Add Users page </h4>

    <div class="container col-md-6">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">

                @if (Session::has('done'))
                    <div class="alert alert-success">
                        {{ Session::get('done') }}
                    </div>
                @endif

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
                        <input type="text" name="name" class="  form-control">
                    </div>
                    <div class="form-group">
                        <label for=""> User Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""> User Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""> Confirm Your Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""> User Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-info"> Register </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
