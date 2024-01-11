@extends('admin.layouts.app')

@section('title', 'Detail')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail User</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @foreach ($users as $user)
                <div>
                    <h5 class="fw-bold">Data User</h5>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $user->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $user->phone_number }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h5 class="fw-bold">Data Kendaraan User</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Merk</th>
                                <th scope="col">Model</th>
                                <th scope="col">Plat</th>
                                <th scope="col">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kendaraans as $kendaraan)
                                <tr>
                                    @if ($user->id == $kendaraan->user->id)
                                        <td>{{ $kendaraan->merk }}</td>
                                        <td>{{ $kendaraan->model }}</td>
                                        <td>{{ $kendaraan->plat }}</td>
                                        <td>{{ $kendaraan->category_kendaraan->name }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
        <!-- /.card-body -->
    </div>
@endsection
