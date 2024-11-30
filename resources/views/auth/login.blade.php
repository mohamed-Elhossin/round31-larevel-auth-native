<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>

    <body>

        <h4 class="text-center my-3"> Login page </h4>

        <div class="container col-md-6">
            <form method="POST" action="{{ route('login_store') }}">
                @csrf
                <div class="card">
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
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
                            <label for=""> User Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""> User Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-info"> Login </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>






        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    </body>

    </html>





    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
