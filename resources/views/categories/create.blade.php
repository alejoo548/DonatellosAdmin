<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spike Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
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
                        <img src="../assets/images/logos/logo.svg" alt="" />
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
                            <span class="hide-menu">Products</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ url("/products") }}"
                                aria-expanded="false">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Products</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Categorias</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ url("/categories") }}"
                                aria-expanded="false">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Categorias</span>
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
                            <h5 class="card-title fw-semibold mb-4">Agregar una categoria</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route("categories.store") }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <!-- Nombre -->
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nombre de Categoria</label>
                                            <input type="text" class="form-control" id="name" name="name" required
                                                maxlength="255">
                                        </div>

                                        <!-- Descripción -->
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Descripción</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"
                                                required></textarea>
                                        </div>

                                        <!-- Botón de envío -->
                                        <button type="submit" class="btn btn-primary">Guardar producto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>