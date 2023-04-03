<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin/layouts/head')
    @stack('head')
</head>

<body id="page-top">
    @include('sweetalert::alert')

    <div id="wrapper">
        @include('admin/layouts/sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin/layouts/navbar')

                <div class="container-fluid">
                    @yield('isi')
                </div>
            </div>

            @include('admin/layouts/footer')
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin logout ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="/logout" class="btn btn-primary" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Logout
                    </a>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('admin/layouts/scripts')
    @stack('script')
</body>

</html>