<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/alert-notify.css')}}">

    <!-- Custom styles for this page -->
    @yield('styles')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('panel.index')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="far fa-smile-wink fa-spin"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Quản lý <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('panel.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Thống kê</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Danh mục
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Quản lý người dùng</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if (Auth::user()->rolename == 'admin' )
                        <h6 class="collapse-header">Quản ly người dùng</h6>

                        <a class="collapse-item" href="{{ route('users.index') }}">Tài khoản người dùng</a>
                        <a class="collapse-item" href="{{ route('employees.index') }}">Danh sách nhân viên</a>
                        @endif
                        @if (Auth::user()->rolename == 'admin' || Auth::user()->rolename == 'Nhân viên')

                        <a class="collapse-item" href="{{ route('customers.index') }}">Danh sách khách hàng</a>
                        @endif

                    </div>
                </div>
            </li>

            <!-- Nav Item - Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                    aria-expanded="true" aria-controls="collapseProducts">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Quản lý sản phẩm</span>
                </a>
                <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts"
                    data-parent="#accordionSidebar">
                    <div class=" collapse-inner bg-primary rounded card">
                        <div class="dropright mb-2">
                            <button class="btn btn-outline-danger dropdown-toggle w-100" type="button"
                                id="droprightGroupGoods" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">

                                <span class="collapse-header text-white">Nhóm hàng</span>
                            </button>
                            <div class="dropdown-menu collapsed" aria-labelledby="droprightGroupGoods">

                                <a class="collapse-item" href="{{ route('groupgoods.index') }}">Danh sách</a>
                            </div>
                        </div>
                        <div class="dropright mb-2">
                            <button class="btn btn-outline-success dropdown-toggle  w-100" type="button"
                                id="droprightGroupProducts" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">

                                <span class="collapse-header text-white ">Nhóm sản phẩm</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="droprightGroupProducts">

                                <a class="collapse-item" href="{{ route('product-type.index') }}">Danh sách</a>
                            </div>
                        </div>
                        <div class="dropright">
                            <button class="btn btn-outline-warning dropdown-toggle  w-100" type="button"
                                id="droprightProducts" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">

                                <span class="collapse-header text-white "> Sản phẩm</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="droprightProducts">
                                <a class="collapse-item" href="{{ route('products.index') }}">Danh sách</a>
                            </div>
                        </div>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
                    aria-expanded="true" aria-controls="collapseOrders">
                    <i class="fas fa-fw fa-file-invoice-dollar"></i>
                    <span>Quản lý đơn hàng</span>
                </a>
                <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('order.index') }}">Danh sách</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStores"
                    aria-expanded="true" aria-controls="collapseStores">
                    <i class="fas fa-fw fa-warehouse"></i>
                    <span>Quản lý kho hàng</span>
                </a>
                <div id="collapseStores" class="collapse" aria-labelledby="headingStores"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ route('warehouses.index') }}">Danh sách</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSuppliers"
                    aria-expanded="true" aria-controls="collapseProducts">
                    <i class="fas fa-fw fa-handshake"></i>
                    <span>Nhà cung cấp</span>
                </a>
                <div id="collapseSuppliers" class="collapse" aria-labelledby="headingSuppliers"
                    data-parent="#accordionSidebar">
                    <div class="bg-info py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('suppliers.index')}} ">Danh sách</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                @if (session()->get('consignments'))
                                <span class="badge badge-danger badge-counter">{{count(session()->get('consignments'))}}</span>
                                @endif

                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Thông báo
                                </h6>
                                @if (session()->get('consignments') == null)
                                <div class="dropdown-notify">
                                @foreach (session()->get('consignments') as $cons)

                                    <a class="dropdown-item d-flex align-items-center" href="{{route('warehouses.show', $cons->id)}}">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-circle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">{{$cons->updated_at}}</div>
                                            <span class="text-muted">Mặt hàng <b class="text-danger">{{$cons->consignment_name}}</b> sắp hết.</span><br>
                                            <span class="font-weight-bold">Số lượng còn lại: {{$cons->consignment_currently}} Kg (tổng số {{$cons->consignment_quantity}} Kg).</span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                @else
                                    <p class="text-muted text-center mx-auto mt-3"> Không có thông báo.</p>
                                @endif
                                <a class="dropdown-item text-center small text-gray-500" href="#">Tất cả thông báo</a>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ url('img/users',Auth::user()->avatar) }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('users.profile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Thông tin
                                </a>
                                <a class="dropdown-item" href="{{route('users.profile')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đổi mật khẩu
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-600">
                            <a href="{{route('panel.index')}}" class="btn btn-primary"><i class="fas fa-home"></i></a>
                        </h1>
                        @if (Auth::user()->rolename == 'admin')

                        <a href="{{route('accounts-locked.index')}}"
                            class="text-right badge badge-danger shadow p-1 rounded">
                            Tài khoản bị khóa</a>
                        @endif
                    </div>

                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn muốn đăng xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn nút "Đăng xuất" bên dưới nếu bạn muốn đăng xuất</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
                    <form method="get" action="{{ route('logout.admin') }}">
                        @csrf
                        <button class="btn btn-primary">Đăng xuất</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level custom scripts -->
    @yield('scripts')
</body>

</html>
