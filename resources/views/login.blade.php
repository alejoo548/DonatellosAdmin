<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign-In Page</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset("assets/css/styles.min.css") }}" />
</head>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center
justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <form action="{{ route('login.store') }}" method="post">
                                    {{-- Utilizamos el token para la protección de la información --}}
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="email">

                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            name="password">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4">Iniciar

                                        Sesión</button>

                                    {{-- Manejamos mostrar mensajes por medio de sesiones, las cuales se encuentran

dentro de nuestro LoginController --}}
                                    {{-- Inicio Alertas --}}
                                    @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                    @endif

                                    @if($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    @if (session('logout'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('logout') }}
                                    </div>
                                    @endif
                                    {{-- Fin Alertas --}}
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">No tienes una cuenta?</p>
                                        <a class="text-primary fw-bold ms-2" href="{{ route("register") }}">Crear una

                                            cuenta</a>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>