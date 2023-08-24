<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MatrialAPP</title>
        <link rel = "icon" href = "{{url('/logo_toko.png')}}" type = "image/x-icon">
        <!-- Fonts -->
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon" />

        <!-- Google Web Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
            rel="stylesheet"
        />
        <!-- alert -->
        <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
            $(function(){
                $(document).on('click', '#delete', function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");

                    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
                });
            });
        </script> -->
        <!-- end alert -->

        <!-- Icon Font Stylesheet -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
            rel="stylesheet"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
            rel="stylesheet"
        />

        <!-- Libraries Stylesheet -->
        <link
            href="/blackadmin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
            rel="stylesheet"
        />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="/blackadmin/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="/blackadmin/css/style.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

        
    </head>

    <body>
        <div class="container-fluid position-relative d-flex p-0">
            <!-- Sidebar Start -->
            <div class="sidebar pe-4 pb-3">
                <nav class="navbar bg-secondary navbar-dark">
                    <a href="index.html" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary">
                            <i class="fa fa-user-edit me-2"></i>Sarana Jaya
                        </h3>
                    </a>
                    <div class="navbar-nav w-100">
                        <a href="/home" class="nav-item nav-link"
                            ><i class="fa fa-tachometer-alt me-2"></i
                            >Dashboard</a
                        >
                        <a href="/barang" class="nav-item nav-link"
                            ><i class="fa fa-th me-2"></i>Data Barang</a
                        >
                        <a href="/supplier" class="nav-item nav-link"
                            ><i class="fa fa-keyboard me-2"></i>Data Supplier</a
                        >
                        <a href="/penjualan" class="nav-item nav-link"
                            ><i class="fa fa-chart-bar me-2"></i>Data Penjualan</a
                        >
                        <a href="{{ url('/users')}}" class="nav-item nav-link"
                            ><i class="fa fa-user me-2"></i>Users</a
                        >
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Sidebar End -->

            <!-- Content Start -->
            <div class="content">
                <!-- Navbar Start -->
                <nav
                    class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0"
                >
                    <a
                        href="index.html"
                        class="navbar-brand d-flex d-lg-none me-4"
                    >
                        <h2 class="text-primary mb-0">
                            <i class="fa fa-user-edit"></i>
                        </h2>
                    </a>
                    <a href="#" class="sidebar-toggler flex-shrink-0">
                        <i class="fa fa-bars"></i>
                    </a>
                    <form class="d-none d-md-flex ms-4">
                        <input
                            class="form-control bg-dark border-0"
                            type="search"
                            placeholder="Search"
                        />
                    </form>
                    <div class="navbar-nav align-items-center ms-auto bg-secondary">
                        <div class="nav-item dropdown m-2 bg-secondary">
                            <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown bg-secondary">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end bg-secondary" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                        </div>
                    </div>
                </nav>
                <!-- Navbar End -->
                <div class="m-5">
                    @yield('content')
                </div>
                
                
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Template Javascript -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
        
<!-- Sweet Alert -->
@include('sweetalert::alert')
<!-- End Sweet Alert -->

    </body>
</html>


<!-- </li>

      Divider
      <hr class="sidebar-divider d-none d-md-block">

      Sidebar Toggler (Sidebar)
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul> -->
