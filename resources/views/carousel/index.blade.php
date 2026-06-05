<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carousel Items | Donatellos Admin</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-dark-theme.css') }}" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar -->
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                        <span class="logo-img text-nowrap d-flex align-items-center fw-bolder fs-5 text-white" style="font-size: 1.3rem !important;">Donatellos <span class="text-primary ms-1" style="color: #a3e635 !important;">Admin</span></span>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ route('dashboard') }}" aria-expanded="false">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Menu Items</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ url('/products') }}" aria-expanded="false">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Menu Items</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Menu Categories</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ url('/categories') }}" aria-expanded="false">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Menu Categories</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Carousel</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="{{ url('/carousel') }}" aria-expanded="false">
                                <iconify-icon icon="solar:gallery-wide-line-duotone"></iconify-icon>
                                <span class="hide-menu">Carousel</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <div class="body-wrapper-inner">
                <div class="container-fluid">

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
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="javascript:void(0)" id="drop2"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('assets/images/profile/user1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                            <div class="message-body">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </header>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h5 class="card-title fw-semibold mb-0">Carousel Items</h5>
                                        <a href="{{ route('carousel.create') }}" class="btn btn-primary">
                                            <i class="ti ti-plus me-1"></i> Add Slide
                                        </a>
                                    </div>

                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table table-borderless align-middle text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Product</th>
                                                    <th>Slide Title</th>
                                                    <th>Slide Description</th>
                                                    <th>Badge</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($items as $item)
                                                <tr>
                                                    <td>{{ $item->order }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3">
                                                            @if($item->product->image_url)
                                                                <img src="{{ $item->product->image_url }}"
                                                                    alt="{{ $item->product->name }}" width="40" height="40"
                                                                    class="rounded" style="object-fit:cover;">
                                                            @endif
                                                            <span>{{ $item->product->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->title }}</td>
                                                    <td class="text-wrap" style="max-width:220px;">{{ $item->description }}</td>
                                                    <td>
                                                        @if($item->badge_text)
                                                            <span class="badge rounded-pill bg-light-primary text-primary px-3 py-2 fs-3">
                                                                {{ $item->badge_text }}
                                                            </span>
                                                        @else
                                                            <span class="text-muted">—</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="badge rounded-pill {{ $item->is_active ? 'bg-light-success text-success' : 'bg-light-danger text-danger' }} px-3 py-2 fs-3">
                                                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('carousel.edit', $item) }}" class="btn btn-sm btn-outline-primary me-1">
                                                            <i class="ti ti-pencil"></i>
                                                        </a>
                                                        <form action="{{ route('carousel.destroy', $item) }}" method="POST" class="d-inline"
                                                            onsubmit="return confirm('Remove this slide?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="7" class="text-center text-muted py-4">No carousel slides yet.</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
