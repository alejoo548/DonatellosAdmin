<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Donatello's Admin</title>
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
                        <span class="logo-img text-nowrap d-flex align-items-center fw-bolder fs-5 text-white" style="font-size: 1.3rem !important;">Donatello's <span class="text-primary ms-1" style="color: #a3e635 !important;">Admin</span></span>
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
                            <span class="hide-menu">Carousel</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ url('/carousel') }}"
                                aria-expanded="false">
                                <iconify-icon icon="solar:gallery-wide-line-duotone"></iconify-icon>
                                <span class="hide-menu">Carousel</span>
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
                                                No new notifications
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

                    <!--  Row 1 -->
                    <div class="row">
                        <div class="col-lg-8 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <div class="">
                                            <h5 class="card-title fw-semibold">Profit & Expenses</h5>
                                        </div>
                                        <div class="dropdown">
                                            <button id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                                class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                                <i class="ti ti-dots-vertical fs-7 d-block"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="profit"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12 col-sm-6">
                                    <!-- User Stats -->
                                    <div class="card overflow-hidden">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-10 fw-semibold">Registered Users</h5>
                                            <div class="row align-items-center">
                                                <div class="col-7">
                                                    <h4 class="fw-semibold mb-3">{{ $usersCount }}</h4>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span
                                                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-arrow-up-left text-success"></i>
                                                        </span>
                                                        <p class="text-dark me-1 fs-3 mb-0">Total</p>
                                                        <p class="fs-3 mb-0">accounts</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3">
                                                            <span
                                                                class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                                            <span class="fs-2">Admins</span>
                                                        </div>
                                                        <div>
                                                            <span
                                                                class="round-8 bg-danger rounded-circle me-2 d-inline-block"></span>
                                                            <span class="fs-2">Clients</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="d-flex justify-content-center">
                                                        <div id="grade"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6">
                                    <!-- Products & Purchases -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-start">
                                                <div class="col-8">
                                                    <h5 class="card-title mb-10 fw-semibold">Products Created</h5>
                                                    <h4 class="fw-semibold mb-3">{{ $productsCount }}</h4>
                                                    <div class="d-flex align-items-center pb-1">
                                                        <span
                                                            class="me-2 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-arrow-up-left text-success"></i>
                                                        </span>
                                                        <p class="text-dark me-1 fs-3 mb-0">Purchases:</p>
                                                        <p class="fs-3 mb-0 fw-bold">{{ $purchasesCount }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-end">
                                                        <div
                                                            class="text-white bg-success rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-currency-dollar fs-6"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="earning"></div>
                                    </div>
                                </div>
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
