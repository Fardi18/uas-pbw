@extends('admin.layouts.app')

@section('title', 'List Bengkel')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bengkel List</h3>

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
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bengkels as $item)
                        <tr class="align-items-center">
                            <td>
                                <p>{{ $loop->iteration }}</p>
                            </td>
                            <td>
                                <p>{{ $item->name }}</p>
                            </td>
                            <td>
                                <img src="{{ asset('images/' . $item->image) }}" alt="" style="width: 10rem">
                            </td>
                            <td>
                                <p>{{ $item->alamat }}</p>
                            </td>
                            <td>
                                {{-- <a href="/admin-listbengkel/{{ $item->id }}/delete"
                                    class="btn btn-danger text-white">Hapus</a> --}}
                                <a href="/admin-detailbengkel/{{ $item->id }}" class="btn btn-warning text-white">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="confirmDelete('{{ $item->id }}')"
                                    class="btn btn-danger text-white">
                                    <i class="fa-solid fa-trash"></i>
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
    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus bengkel ini?')) {
                window.location.href = '/admin-listbengkel/' + id + '/delete';
            }
        }
    </script>
@endpush
