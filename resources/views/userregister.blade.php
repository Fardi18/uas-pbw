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
    <title>Repair X Shop | Register</title>

    <style>
        body {
            background-color: #3b5d50;
        }

        .register-box {
            /* box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px; */
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
                <h3 class="text-center">Welcome <span class="text-primary">Automotive Enthusiast</span></h3>
                <p class="text-secondary text-center">Enter your data to continue your journey</p>
            </div>
            <form method="POST" action="{{ route('do.userregister') }}">
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
                        <label for="kecamatan_id" class="form-label">Kecamatan</label>
                        <select class="form-select" aria-label="Default select example" name="kecamatan_id"
                            id="kecamatan_id">
                            <option selected>-- Pilih Kecamatan --</option>
                            @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label for="kelurahan_id" class="form-label">Kelurahan</label>
                        <select class="form-select" aria-label="Default select example" name="kelurahan_id"
                            id="kelurahan_id">
                            <option selected>-- Pilih Kelurahan --</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"></textarea>
                        </div>
                        @error('alamat')
                            <div id="alamatHelp" class="form-text">{{ $message }}</div>
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

                <div class="mb-3 mt-5">
                    <button class="btn btn-primary w-100" style="border-radius: 20px" type="submit">Register</button>
                    <p class="mt-3 text-center">
                        Sudah punya akun?
                        <a href="{{ route('login') }}">silakan login.</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#kecamatan_id').change(function() {
                var kecamatan_id = $(this).val();
                $.ajax({
                    url: '/get-kelurahans/' + kecamatan_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#kelurahan_id').empty();
                        $('#kelurahan_id').append(
                            '<option selected>-- Pilih Kelurahan --</option>');
                        $.each(data, function(key, value) {
                            $('#kelurahan_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
