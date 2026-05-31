<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculadora - DrugStore</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
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
        <!-- Sidebar End -->

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <div class="body-wrapper-inner">
                <div class="container-fluid">

                    <!-- Header -->
                    <header class="app-header">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <ul class="navbar-nav">
                                <li class="nav-item d-block d-xl-none">
                                    <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                        <i class="ti ti-menu-2"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                                <ul class="navbar-nav flex-row ms-auto align-items-center">
                                    <!-- Aquí va tu menú de usuario (logout, etc.) -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">
                                            <img src="../assets/images/profile/user1.jpg" alt="" width="35" height="35"
                                                class="rounded-circle">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </header>
                    <!-- Header End -->

                    <!-- Contenido de la Calculadora -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Calculadora Básica</h5>

                            <div class="row justify-content-center">
                                <div class="col-md-6">

                                    <form method="POST" action="{{ route('calculadora') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Primer Número</label>
                                            <input type="number" step="any" name="num1"
                                                class="form-control form-control-lg" value="{{ old('num1') }}"
                                                placeholder="Ej: 25" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Segundo Número</label>
                                            <input type="number" step="any" name="num2"
                                                class="form-control form-control-lg" value="{{ old('num2') }}"
                                                placeholder="Ej: 5" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Operación</label>
                                            <select name="operacion" class="form-select form-select-lg">
                                                <option value="sumar">+</option>
                                                <option value="restar">-</option>
                                                <option value="multiplicar">×</option>
                                                <option value="dividir">÷</option>
                                            </select>
                                        </div>



                                        <button type="submit" class="btn btn-primary w-100 btn-lg">Calcular</button>
                                    </form>

                                    <!-- Resultado -->
                                    @if(session('resultado') !== null)
                                    <div class="alert alert-success mt-4 text-center fs-4">
                                        <strong>
                                            {{ session('num1') }}
                                            @if(session('operacion') == 'sumar') +
                                            @elseif(session('operacion') == 'restar') -
                                            @elseif(session('operacion') == 'multiplicar') ×
                                            @elseif(session('operacion') == 'dividir') ÷ @endif
                                            {{ session('num2') }}
                                            = {{ session('resultado') }}
                                        </strong>
                                    </div>
                                    @endif

                                    @if(session('error'))
                                    <div class="alert alert-danger mt-4 text-center">
                                        {{ session('error') }}
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>