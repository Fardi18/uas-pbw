@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="">
                        <h1>Hola @auth
                                {{ Auth::user()->name }}
                            @endauth
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col px-3 bg-light rounded-3">
                    <div class="d-flex align-items-center justify-content-between my-3 bg-white p-3 rounded-3">
                        <h5 style="margin: 0;">Detail Profil</h5>
                        <a class="btn btn-md btn-primary" href="/profileuser/{{ Auth::user()->id }}">Lihat</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between my-3 bg-white p-3 rounded-3">
                        <h5 style="margin: 0;">Daftar Booking</h5>
                        <a class="btn btn-md btn-primary" href="{{ url('/profile-booking') }}">Lihat</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between my-3 bg-white p-3 rounded-3">
                        <h5 style="margin: 0;">Daftar Transaksi</h5>
                        <a class="btn btn-md btn-primary" href="{{ url('/profile-transaction') }}">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
