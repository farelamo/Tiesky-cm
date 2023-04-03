@extends('admin.master')

@push('head')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('isi')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Product</h3>
                <div class="btn-group ml-auto" role="group">
                    <button class="btn btn-primary px-2" onclick="dataexport('copy')">Copy</button>
                    <button class="btn btn-primary px-2" onclick="dataexport('csv')">CSV</button>
                    <button class="btn btn-primary px-2" onclick="dataexport('excel')">Excel</button>
                    <button class="btn btn-primary px-2" onclick="dataexport('pdf')">PDF</button>
                    <button class="btn btn-primary px-2" onclick="dataexport('print')">Print</button>
                </div>
                <a href="/dashboard/product/create" class="btn btn-primary btn-icon-split ml-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Product</span>
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
                            <th>Deskripsi Singkat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->short_desc }}</td>
                                <td>
                                    <a href="/dashboard/product/{{ $product->id }}/edit"
                                        class="btn btn-sm btn-success">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger" onclick="hapus({{ $product->id }})"
                                        data-toggle="modal" data-target="#hapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Product Kosong</td>
                                <td>Product Kosong</td>
                                <td>Product Kosong</td>
                                <td>Product Kosong</td>
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
    <!-- Datatables Buttons -->
    <script src="{{ asset('admin/js/dataexport.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script>
        function hapus(id) {
            $('#hapusForm').attr('action', `/dashboard/product/${id}`);
        }
    </script>
    <script>
        $(document).ready(function () {
          $('#myTable').DataTable({
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All Pages"]],
            "pageLength": 10,
            "order": [[0, 'desc']],
            "language": {
              "paginate": {
                "previous": "<",
                "next": ">"
              }
            },
            "dom": 'Bfrtip',
            "buttons": ['copy', 'csv', 'excel', 'pdf', 'print']
          });
        });
    </script>
@endpush
