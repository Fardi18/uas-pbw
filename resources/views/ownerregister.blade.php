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
    <title>CARS | Register</title>

    <style>
        body {
            background-color: #3b5d50;
        }

        .register-box {
            /* box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 80px 0px; */
            /* width: 500px; */
            background-color: white;
            /* border-radius: 32px */
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="register-box p-5">
            <div class="title mb-5">
                <h3 class="text-center">Welcome <span class="text-primary">Owner</span></h3>
                <p class="text-secondary text-center">Enter your data to get your first transaction</p>
            </div>
            <form method="POST" action="{{ route('do.ownerregister') }}">
                @csrf
                <div class="row">
                    <div class="col col-lg-4 col-md-4 col-sm-12 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameHelp">
                        @error('name')
                            <div id="nameHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col col-lg-4 col-md-4 col-sm-12 mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" aria-describedby="emailHelp">
                        @error('email')
                            <div id="emailHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col col-lg-4 col-md-4 col-sm-12 mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                            name="phone_number" id="phone_number" aria-describedby="phone_numberHelp">
                        @error('phone_number')
                            <div id="phone_numberHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" id="password">
                        @error('password')
                            <div id="passwordHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" id="password_confirmation">
                        @error('password_confirmation')
                            <div id="passwordConfirmationHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 mt-5 ">
                    <button class="btn btn-primary w-100" style="border-radius: 20px"
                        type="submit
                    ">Register</button>
                    <p class="mt-3 text-center">
                        Sudah punya akun?
                        <a href="{{ route('login') }}">silakan login.</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
