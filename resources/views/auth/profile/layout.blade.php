@extends('layouts.app')



@section('content')
    <div class="container col-md-6">
        @if (Session::has('done'))
            <div class="message_section">
                <div class="success-message">
                    ✅ {{ Session::get('done') }}
                </div>
            </div>
        @endif


        @include('auth.profile.changeImage')
        @include('auth.profile.changeData')
        @include('auth.profile.changepassword')

        <div class="card">
            <div class="card-body">
                <form action="{{ route('profile.deleteAccount') }}" method="POST">
                    @csrf
                    <input placeholder="Enter Your Password" type="password" name="current_password" class="form-control">
                    <button class="btn btn-danger">Delete Account </button>
                </form>
            </div>
        </div>
    </div>
@endsection
