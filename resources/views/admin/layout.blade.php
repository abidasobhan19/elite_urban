<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f3f6f8; }
        .admin-sidebar {
            background: #113428;
            min-height: 100vh;
            color: #fff;
        }
        .admin-sidebar a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            display: block;
            padding: .55rem .75rem;
            border-radius: .35rem;
            margin-bottom: .25rem;
        }
        .admin-sidebar a:hover { background: rgba(255, 255, 255, 0.12); }
        .card-soft {
            border: 0;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(17, 52, 40, 0.08);
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <aside class="col-lg-2 col-md-3 admin-sidebar p-3">
            <h1 class="h5 fw-bold mb-4">LandPro Admin</h1>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.properties.index') }}">Properties</a>
            <a href="{{ route('admin.leads.index') }}">Leads</a>
            <a href="{{ route('admin.settings.pixel.edit') }}">Pixel Setup</a>
            <form action="{{ route('admin.logout') }}" method="post" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </aside>
        <main class="col-lg-10 col-md-9 p-3 p-md-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
