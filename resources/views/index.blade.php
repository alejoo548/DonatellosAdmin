<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Laravel</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset("assets/css/styles.min.css") }}" />
<link rel="stylesheet" href="{{ asset('assets/css/custom-dark-theme.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route("dashboard") }}" class="text-nowrap logo-img">
                        <span class="logo-img text-nowrap d-flex align-items-center fw-bolder fs-5 text-white" style="font-size: 1.3rem !important;">Donatellos <span class="text-primary ms-1" style="color: #a3e635 !important;">Admin</span></span>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ route("dashboard") }}"
                                aria-expanded="false">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Menu Items</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ url("/products") }}"
                                aria-expanded="false">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Menu Items</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Menu Categories</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ url("/categories") }}"
                                aria-expanded="false">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Menu Categories</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Calculadora</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ url("/calculadora") }}"
                                aria-expanded="false">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Calculadora</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Calculadora de promedios</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ url("/promedios") }}"
                                aria-expanded="false">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Calculadora de promedios</span>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">

            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <!--  Header Start -->
                    <header class="app-header">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <ul class="navbar-nav">
                                <li class="nav-item d-block d-xl-none">
                                    <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                                        <i class="ti ti-menu-2"></i>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <iconify-icon icon="solar:bell-linear" class="fs-6"></iconify-icon>
                                        <div class="notification bg-primary rounded-circle"></div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                                        <div class="message-body">
                                            <a href="javascript:void(0)" class="dropdown-item">
                                                Item 1
                                            </a>
                                            <a href="javascript:void(0)" class="dropdown-item">
                                                Item 2
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link " href="javascript:void(0)" id="drop2"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="../assets/images/profile/user1.jpg" alt="" width="35" height="35"
                                                class="rounded-circle">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="message-body">
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 dropdown-item">
                                                    <i class="ti ti-user fs-6"></i>
                                                    <p class="mb-0 fs-3">My Profile</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 dropdown-item">
                                                    <i class="ti ti-mail fs-6"></i>
                                                    <p class="mb-0 fs-3">My Account</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 dropdown-item">
                                                    <i class="ti ti-list-check fs-6"></i>
                                                    <p class="mb-0 fs-3">My Task</p>
                                                </a>

                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </header>
                    <!--  Header End -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-4 pb-2">Menu Items</h4>
                                <a href="{{ route("products.create") }}" class="btn btn-primary mb-4">Add Menu Item</a>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="table-responsive pb-4">
                                <table id="all-student"
                                    class="table table-striped table-bordered border text-nowrap align-middle">
                                    <thead>
                                        <!-- start row -->
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Availability</th>
                                            <th>Category</th>
                                            <th>Acciones</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        @if ($product == null)
                                        <tr>
                                            <td colspan="6">No menu items registered.</td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                            alt="{{ $product->name }}" width="50" height="50"
                                                            class="rounded-circle" />
                                                    </div>

                                                    <div>
                                                        <h6 class="mb-1">{{ $product->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $product->description }}</td>
                                            <td>${{ $product->price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->status }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>
                                                <div class="d-flex gap-3 align-items-center">
                                                    <a href="../main/teacher-details.html" class="link-primary"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="View Details">
                                                        <i class="ti ti-eye fs-7"></i>
                                                    </a>
                                                    <a href="{{ route("products.edit", $product->id) }}"
                                                        class="link-success" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit">
                                                        <i class="ti ti-edit fs-7"></i>
                                                    </a>
                                                    <form action="{{ route('products.destroy', $product->id) }}"
                                                        method="POST" class="m-0 p-0 d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this record?')"
                                                            class="btn btn-link p-0 m-0 border-0 shadow-none link-danger"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Delete">
                                                            <i class="ti ti-trash fs-7"></i>
                                                        </button>
                                                    </form>
                                            </td>
                                        </tr>
                                        <!-- end row -->
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset("assets/libs/jquery/dist/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("assets/js/sidebarmenu.js") }}"></script>
    <script src="{{ asset("assets/js/app.min.js") }}"></script>
    <script src="{{ asset("assets/libs/apexcharts/dist/apexcharts.min.js")}}"></script>
    <script src="{{ asset("assets/libs/simplebar/dist/simplebar.js")}}"></script>
    <script src="{{ asset("assets/js/dashboard.js")}}"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
