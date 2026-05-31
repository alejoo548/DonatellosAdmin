<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Promedios - DrugStore</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar -->
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/logo.svg" alt="DrugStore" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>

                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('dashboard') }}">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('/calculadora') }}">
                                <iconify-icon icon="solar:calculator-line-duotone"></iconify-icon>
                                <span class="hide-menu">Calculadora</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a class="sidebar-link" href="{{ url('/promedios') }}">
                                <iconify-icon icon="solar:chart-line-duotone"></iconify-icon>
                                <span class="hide-menu">Promedios</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
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
                            <!-- Usuario -->
                            <div class="navbar-collapse justify-content-end px-0">
                                <ul class="navbar-nav flex-row ms-auto">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">
                                            <img src="../assets/images/profile/user1.jpg" alt="" width="35" height="35" class="rounded-circle">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary mx-3 mt-2">Logout</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </header>

                    <!-- Contenido Principal -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">📊 Calculadora de Promedios</h5>

                            <div class="row justify-content-center">
                                <div class="col-md-5">

                                    <form method="POST" action="{{ route('promedios') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Nota 1</label>
                                            <input type="number" step="0.01" name="nota1" class="form-control form-control-lg" 
                                                   value="{{ old('nota1') }}" placeholder="Ej: 7.5" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Nota 2</label>
                                            <input type="number" step="0.01" name="nota2" class="form-control form-control-lg" 
                                                   value="{{ old('nota2') }}" placeholder="Ej: 8.0" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Nota 3</label>
                                            <input type="number" step="0.01" name="nota3" class="form-control form-control-lg" 
                                                   value="{{ old('nota3') }}" placeholder="Ej: 6.5" required>
                                        </div>

                                        <button type="submit" class="btn btn-success w-100 btn-lg">Calcular Promedio</button>
                                    </form>

                                    <!-- Resultado -->
                                    @if(session('promedio') !== null)
                                        <div class="alert alert-info mt-4 text-center">
                                            <h4>Promedio: <strong>{{ session('promedio') }}</strong></h4>
                                            <h5 class="mt-2">{{ session('estado') }}</h5>
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