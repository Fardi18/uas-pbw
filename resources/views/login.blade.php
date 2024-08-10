<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="{{ asset('/user-tamplate') }}/css/style.css" rel="stylesheet">
    <title>Repair X Shop | Login</title>

    <style>
        body {
            background-color: #3b5d50;
        }

        .login-box {
            /* border: solid 1px gray; */
            /* box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px; */
            width: 600px;
            background-color: white;
            /* border-radius: 32px */
        }
    </style>
</head>

<body>
    <div class="vh-100 p-5 d-flex justify-content-center align-items-center">
        <div class="login-box p-5">
            <div class="title mb-3">
                <h3 class="text-center">Welcome Back to <span class="text-primary">Repair X Shop</span></h3>
                <p class="text-secondary text-center">Masukkan email dan passwordmu</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3 form">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                        <div id="emailHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div id="passwordHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 mt-5 ">
                    <button class="btn btn-primary w-100" type="submit" style="border-radius: 20px;">Login</button>
                    <p class="mt-3 text-center"><a href="{{ route('password.request') }}"><b>Lupa password?</b></a></p>
                    <p class="mt-3 text-center">Belum punya akun?</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('userregister') }}" class="btn btn-md btn-primary w-100 mb-2 mt-2"
                            style="border-radius: 20px;">
                            Daftar User
                        </a>
                        <div class="mx-1"></div>
                        <a href="{{ route('ownerregister') }}" class="btn btn-md btn-primary w-100"
                            style="border-radius: 20px">Daftar
                            Mitra</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
