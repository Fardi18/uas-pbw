@extends('layouts.app')

@section('title', 'Service')

@section('content')
    {{-- service --}}
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Service</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <section class="search">
        <div class="container">
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
                    <select class="form-select" id="specialist" name="specialist_id" aria-label="Default select example">
                        <option selected>-- Pilih Spesialis --</option>
                        @foreach ($specialists as $specialist)
                            <option value="{{ $specialist->id }}">{{ $specialist->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="search">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-lg-8">
                    <form id="filter-form" action="" method="GET">
                        @csrf
                        <input type="text" class="form-control" placeholder="Cari bengkel disini" name="keyword">
                        <input type="hidden" id="kecamatan-id" name="kecamatan_id">
                        <input type="hidden" id="kelurahan-id" name="kelurahan_id">
                        <input type="hidden" id="specialist-id" name="specialist_id">
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
                    <select class="form-select" id="specialist" aria-label="Default select example">
                        <option selected>-- Pilih Spesialis --</option>
                        @foreach ($specialists as $specialist)
                            <option value="{{ $specialist->id }}">{{ $specialist->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </section>
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 bengkel">
                @foreach ($bengkels as $bengkel)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="/detailbengkelpage/{{ $bengkel->id }}">
                            <img src="{{ asset('images/' . $bengkel->image) }}" class="img-fluid product-thumbnail w-100"
                                style="height: 280px; object-fit: cover">
                            <h3 class="product-title">{{ $bengkel->name }}</h3>
                            <span class="fw-bold">
                                {{ $bengkel->specialists->pluck('name')->join(', ') }}
                            </span>
                            <span class="icon-cross" href="/detailbengkelpage/{{ $bengkel->id }}">
                                <img src="{{ asset('/user-tamplate/images/cross.svg') }}" class="img-fluid">
                            </span>
                        </a>
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

        document.getElementById('specialist').addEventListener('change', function() {
            var specialistId = this.value;
            document.getElementById('specialist-id').value = specialistId;
            document.getElementById('filter-form').submit();
        });
    </script>
@endpush
