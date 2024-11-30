<div class="card">
    <h1 class="text-info text-center"> Change Data </h1>

    <div class="card-body">

        <form method="POST" action="{{ route('profile.chagneData') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for=""> Name </label>
                <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for=""> Email</label>
                <input type="email" value="{{ Auth::user()->email }}" name="email" class="form-control">
            </div>
            <button type="submit" class="btn btn-warning"> Update </button>
        </form>
    </div>
</div>
