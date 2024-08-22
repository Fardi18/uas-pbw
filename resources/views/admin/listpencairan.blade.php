@extends('admin.layouts.app')

@section('title', 'List Pencairan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pencairan List</h3>

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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Bengkel</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pencairans as $pencairan)
                        <tr class="align-pencairans-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pencairan->bengkel->name }}</td>
                            <td>{{ number_format($pencairan->amount) }}</td>
                            <td>{{ $pencairan->status }}</td>
                            <td>{{ $pencairan->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.pencairan.edit', $pencairan->id) }}"
                                    class="btn btn-warning text-white">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@push('javascript')
@endpush
