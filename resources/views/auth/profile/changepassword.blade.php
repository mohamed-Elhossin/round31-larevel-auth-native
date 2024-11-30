<div class="card">
    <h1 class="text-info text-center"> Change Password </h1>
    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="POST" action="{{ route('profile.changePassword') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for=""> Current Password</label>
                <input type="password" name="current_password" class="form-control">
            </div>
            <div class="form-group">
                <label for=""> User Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for=""> Confirm Your Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-info"> Register </button>

        </form>
    </div>
</div>
