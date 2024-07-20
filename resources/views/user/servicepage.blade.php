@extends('layouts.app')

@section('title', 'Service')

@section('content')
    {{-- hero --}}
    <div class="hero d-flex align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-white fw-bold mb-4">Layanan Kami</h1>
                    <p class="text-white mb-5 text-opacity-75">
                        Berikut adalah layanan yang bisa kami berikan untuk Anda
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- service --}}
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <h3 class="title">Mau Service Apa Hari Ini?</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-lg-8">
                    <form id="filter-form" action="" method="GET">
                        @csrf
                        <input type="text" class="form-control" placeholder="Cari bengkel disini" name="keyword">
                        <input type="hidden" id="kecamatan-id" name="kecamatan_id">
                        <input type="hidden" id="kelurahan-id" name="kelurahan_id">
                    </form>
                    <div class="d-flex align-items-center justify-content-between my-3">
                        <select class="form-select" id="kecamatan" aria-label="Default select example">
                            <option selected>-- Pilih Kecamatan --</option>
                            @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                            @endforeach
                        </select>
                        <div class="mx-1"></div>
                        <select class="form-select" id="kelurahan" aria-label="Default select example">
                            <option selected>-- Pilih Kelurahan --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 bengkel">
                @foreach ($bengkels as $bengkel)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/' . $bengkel->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $bengkel->name }}</h5>
                                <div class="d-flex align-items-center location">
                                    <img src="{{ asset('css/icon-location.png') }}">
                                    <p>{{ $bengkel->alamat }}</p>
                                </div>
                                <a href="/detailbengkelpage/{{ $bengkel->id }}" class="btn btn-primary">Lihat Bengkel</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        document.getElementById('kecamatan').addEventListener('change', function() {
            var kecamatanId = this.value;
            document.getElementById('kecamatan-id').value = kecamatanId;
            fetch(`/kelurahan/${kecamatanId}`)
                .then(response => response.json())
                .then(data => {
                    var kelurahanSelect = document.getElementById('kelurahan');
                    kelurahanSelect.innerHTML = '<option selected>-- Pilih Kelurahan --</option>';
                    data.forEach(kelurahan => {
                        var option = document.createElement('option');
                        option.value = kelurahan.id;
                        option.text = kelurahan.name;
                        kelurahanSelect.appendChild(option);
                    });
                });
        });

        document.getElementById('kelurahan').addEventListener('change', function() {
            var kelurahanId = this.value;
            document.getElementById('kelurahan-id').value = kelurahanId;
            document.getElementById('filter-form').submit();
        });
    </script>
@endpush
