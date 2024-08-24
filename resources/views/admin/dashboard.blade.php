@extends('admin.layouts.app')

{{-- @section('title', 'Dashboard Admin') --}}

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <a href="/admin-listuser">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $user_count }}</h3>
                                <p>User</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-6">
                    <a href="admin-listowner">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $owner_count }}</h3>
                                <p>Owner</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-6">
                    <a href="admin-listbengkel">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3 class="text-white">{{ $bengkel_count }}</h3>
                                <p class="text-white">Bengkel</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-6">
                    <a href="admin-listbooking">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3 class="text-white">{{ $booking_count }}</h3>
                                <p class="text-white">Booking</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-6">
                    <a href="admin-transaction">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 class="text-white">{{ $transaction_count }}</h3>
                                <p class="text-white">Transaksi</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-6">
                    <a href="admin-pencairan">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3 class="text-white">{{ $pencairan_count }}</h3>
                                <p class="text-white">Pencairan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
