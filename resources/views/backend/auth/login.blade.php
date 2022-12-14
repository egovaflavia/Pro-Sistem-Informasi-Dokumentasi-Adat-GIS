<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(Route::current()->getName()) }} - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('storage/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/assets/images/logo/logo-mng.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('storage/assets/images/logo/logo-mng.png') }}" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Login.</h1>

                    <p class="auth-subtitle ">Sistem Informasi Adat Minangkabau</p>
                    <form method="POST" action="{{ route('login'); }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="username" type="text" class="form-control form-control-xl"
                                placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="password" type="password" class="form-control form-control-xl"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>

    </div>
</body>

</html>
