@extends('admin.master')

@push('head')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('isi')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Category</h3>
                <a href="/dashboard/category/create" class="btn btn-primary btn-icon-split ml-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Category</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="/dashboard/category/{{ $category->id }}/edit"
                                        class="btn btn-sm btn-success">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger" onclick="hapus({{ $category->id }})"
                                        data-toggle="modal" data-target="#hapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Category Kosong</td>
                                <td>Category Kosong</td>
                                <td>Category Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ht">Hapus Data</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" id="hapusForm">
                        @csrf
                        @method('DELETE')

                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                        <div class="modal-footer px-0 py-2">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger" name="submit" value="delete">
                                <i class="fa fa-trash"></i>
                                <span>Delete</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
    <script>
        function hapus(id) {
            $('#hapusForm').attr('action', `/dashboard/category/${id}`);
        }
    </script>
    <script>
        $(document).ready(function () {
          $('#myTable').DataTable({
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All Pages"]],
            "pageLength": 10,
            "order": [[0, 'asc']],
            "language": {
              "paginate": {
                "previous": "<",
                "next": ">"
              }
            },
          });
        });
    </script>
@endpush
