<div class="card">
    <h1 class="text-info text-center"> Change Image </h1>

    <div class="card-body">

        <img class="w-25 img-fluid" src="{{ asset('upload') . '/' . Auth::user()->image }}" alt="">

        <form method="POST" action="{{ route('profile.changeImage') }}" enctype="multipart/form-data">

            @csrf
            <input type="file" name="image" class="btn btn-info form-control " accept="image/*">
            <button type="submit" class="btn btn-warning"> Update </button>

        </form>
    </div>
</div>
