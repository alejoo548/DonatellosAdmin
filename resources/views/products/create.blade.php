<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Menu Item | Donatellos Admin</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-dark-theme.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
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
                        <span class="logo-img text-nowrap d-flex align-items-center fw-bolder fs-5 text-white"
                            style="font-size: 1.3rem !important;">Donatellos <span class="text-primary ms-1"
                                style="color: #a3e635 !important;">Admin</span></span>
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
                                            <img src="{{ asset('assets/images/profile/user1.jpg') }}" alt="" width="35" height="35"
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
                            <h5 class="card-title fw-semibold mb-4">Create Menu Item</h5>
                            @if($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route("products.store") }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Item Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required
                                                maxlength="255" value="{{ old('name') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"
                                                required>{{ old('description') }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price ($)</label>
                                            <input type="number" class="form-control" id="price" name="price"
                                                step="0.01" min="0" required value="{{ old('price') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="number" class="form-control" id="stock" name="stock" min="1"
                                                step="1" required value="{{ old('stock', 1) }}">
                                            <small class="text-muted">
                                                Stock must be greater than 0.
                                            </small>
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Item Image</label>
                                            <input type="file" class="dropify" id="image" name="image" accept="image/*"
                                                data-allowed-file-extensions="jpg png jpeg gif webp">
                                        </div>

                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Menu Category</label>
                                            <select class="form-select" id="category_id" name="category_id" required>
                                                <option value="">Select category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div id="pizza-options" style="display:none;">
                                            <hr>

                                            <h5>Pizza Sizes</h5>
                                            <div id="sizes-container"></div>

                                            <button type="button" class="btn btn-outline-primary mb-3"
                                                onclick="addOption('size')">
                                                + Add Size
                                            </button>

                                            <hr>

                                            <h5>Crust Options</h5>
                                            <div id="crusts-container"></div>

                                            <button type="button" class="btn btn-outline-primary mb-3"
                                                onclick="addOption('crust')">
                                                + Add Crust
                                            </button>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Menu Item</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
    <script>
        let sizeIndex = 0;
        let crustIndex = 0;

        function addOption(type) {
            const container = type === 'size'
                ? document.getElementById('sizes-container')
                : document.getElementById('crusts-container');

            const index = type === 'size' ? sizeIndex++ : crustIndex++;

            const row = document.createElement('div');
            row.className = 'row mb-2';

            row.innerHTML = `
        <div class="col-md-6">
            <input type="text"
                   name="${type}s[${index}][name]"
                   class="form-control"
                   placeholder="${type === 'size' ? 'Size name, e.g. Medium' : 'Crust name, e.g. Thin Crust'}">
        </div>

        <div class="col-md-4">
            <input type="number"
                   name="${type}s[${index}][extra_price]"
                   class="form-control"
                   step="0.01"
                   min="0"
                   placeholder="Extra price (optional)">
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-danger w-100" onclick="this.closest('.row').remove()">
                X
            </button>
        </div>
    `;

            container.appendChild(row);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const categorySelect = document.getElementById('category_id');
            const pizzaOptions = document.getElementById('pizza-options');

            function togglePizzaOptions() {
                const selectedText = categorySelect.options[categorySelect.selectedIndex]
                    .text
                    .toLowerCase();

                if (selectedText.includes('pizza')) {
                    pizzaOptions.style.display = 'block';
                } else {
                    pizzaOptions.style.display = 'none';
                }
            }

            categorySelect.addEventListener('change', togglePizzaOptions);
            togglePizzaOptions();
        });
    </script>
</body>

</html>