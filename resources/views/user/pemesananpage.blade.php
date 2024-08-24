@extends('layouts.app')

@section('title', 'Pesan Bengkel')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="">
                        <h1>Halaman Pemesanan <br> {{ $bengkel->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-xl-5 pesan">
        <div class="pesan-bengkel">
            <div class="container my-3 p-5">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('/booking') }}" method="POST">
                        @csrf
                        <input type="hidden" name="bengkel_id" value="{{ $bengkel->id }}">
                        <h1 class="text-center font-weight-bold mb-3">Formulir Booking</h1>
                        <p class="text-center mb-5">Isi formulir di bawah ini untuk membuat booking pada bengkel
                            pilihanmu</p>
                        <div class="mb-5">
                            <h4 class="font-weight-bold mb-3">Data Customer </h4>
                            <div class="row">
                                <div class="col-lg-3 mb-3">
                                    <label for="exampleInputName" class="form-label">Name</label>
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}"
                                        class="@error('user_id') is-invalid @enderror">
                                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="name"
                                        value="{{ Auth::user()->name }}" name="name" disabled>
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="exampleInputEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail"
                                        value="{{ Auth::user()->email }}" name="email" disabled>
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="typeNumber" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="typeNumber"
                                        value="{{ Auth::user()->phone_number }}" name="phone_number" disabled>
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="typeEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="typeEmail"
                                        value="{{ Auth::user()->email }}" name="email" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="font-weight-bold mb-3 ">Data Kendaraan</h4>
                            <div class="row">
                                <div class="col-lg-3 mb-3">
                                    <label for="brand" class="form-label">Brand Mobil</label>
                                    <input type="text" class="form-control" id="brand" aria-describedby="name"
                                        name="brand" placeholder="Contoh: Honda">
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="model" class="form-label">Model Mobil</label>
                                    <input type="text" class="form-control" id="model" aria-describedby="name"
                                        name="model" placeholder="Contoh: Brio">
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
                                    <input type="number" class="form-control" id="tahun_pembuatan" aria-describedby="name"
                                        name="tahun_pembuatan" placeholder="Contoh: 2009">
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="kilometer" class="form-label">Kilometer (km)</label>
                                    <input type="number" class="form-control" id="kilometer" aria-describedby="name"
                                        name="kilometer" placeholder="Contoh: 3000">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="plat" class="form-label">No. Polisi</label>
                                    <input type="text" class="form-control" id="model" aria-describedby="name"
                                        name="plat" placeholder="Contoh: A 412 FL">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="transmisi" class="form-label">Transmisi</label>
                                    <select class="form-select" aria-label="Default select example" name="transmisi">
                                        <option selected>-- Pilih Transmisi</option>
                                        <option value="Manual">Manual</option>
                                        <option value="Matic">Matic</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="mb-5">
                    <h4 class="font-weight-bold mb-3 ">Waktu Service</h4>
                    <div class="row g-4 pesan">
                        <div class="col mb-3">
                            <label for="waktu_booking" class="form-label">Tanggal Service</label>
                            <input type="date" class="form-control w-100 @error('waktu_booking') is-invalid @enderror"
                                id="tanggal_booking" name="tanggal_booking">
                            <i class="text-secondary">* Pilih tanggal booking yang sesuai</i>
                            @error('tanggal_booking')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="waktu_booking" class="form-label">Waktu Service</label>
                            <input type="time" class="form-control w-100 @error('waktu_booking') is-invalid @enderror"
                                id="waktu_booking" name="waktu_booking">
                            <i class="text-secondary">* Pilih waktu booking sesuai dengan waktu
                                operasional Bengkel</i>
                            @error('waktu_booking')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="catatan_tambahan" class="form-label">Catatan Tambahan</label>
                    <textarea class="form-control" id="catatan_tambahan" name="catatan_tambahan" rows="5"
                        placeholder="Tambahkan catatan tambahan disini"></textarea>
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-md btn-primary w-100">Selanjutnya</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>


@endsection

@push('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookingInput = document.getElementById('waktu_booking');
            const dateInput = document.getElementById('tanggal_booking');

            function fetchBookedTimes() {
                const bengkelId = document.querySelector('input[name="bengkel_id"]').value;
                const selectedDate = dateInput.value;

                fetch(`/api/bengkel/${bengkelId}/booked-times?date=${selectedDate}`)
                    .then(response => response.json())
                    .then(data => {
                        const bookedHours = data.map(booking => booking.waktu_booking.slice(0,
                            2)); // Get hour part only

                        bookingInput.addEventListener('input', function() {
                            const selectedHour = bookingInput.value.slice(0, 2);
                            if (bookedHours.includes(selectedHour)) {
                                alert('Jam ini sudah dipesan oleh user lain. Silakan pilih jam lain.');
                                bookingInput.value = ''; // Reset input waktu_booking
                            }
                        });
                    });
            }

            dateInput.addEventListener('change', fetchBookedTimes);
        });
    </script>
@endpush
