<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Property Land Sales' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --brand-dark: #10322a;
            --brand-mid: #1f5e4f;
            --brand-light: #eff8f4;
            --text-dark: #1b1f24;
            --accent: #f4b63d;
        }

        body {
            font-family: "Urbanist", sans-serif;
            color: var(--text-dark);
            background: radial-gradient(circle at top right, #ffffff 0%, #f4faf7 40%, #eef5f2 100%);
        }

        .hero-block {
            background: linear-gradient(130deg, rgba(16, 50, 42, 0.92), rgba(31, 94, 79, 0.88));
            color: #fff;
            border-radius: 24px;
            padding: 4rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .hero-block::after {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 50%;
            right: -70px;
            top: -60px;
        }

        .property-card {
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 28px rgba(16, 50, 42, 0.10);
            transition: transform .2s ease;
        }

        .property-card:hover {
            transform: translateY(-4px);
        }

        .property-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .section-title {
            font-weight: 800;
            color: var(--brand-dark);
            letter-spacing: .02em;
        }

        .btn-brand {
            background: var(--brand-mid);
            color: #fff;
            border: none;
        }

        .btn-brand:hover {
            background: var(--brand-dark);
            color: #fff;
        }
    </style>
    @if(!empty($pixelId))
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $pixelId }}');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id={{ $pixelId }}&ev=PageView&noscript=1"/>
        </noscript>
    @endif
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="{{ route('home') }}">LandPro Realty</a>
        <a href="{{ route('checkout.show') }}" class="btn btn-brand">Checkout / Lead Form</a>
    </div>
</nav>

<main class="container py-4 py-md-5">
    @yield('content')
</main>

<footer class="border-top bg-white py-3">
    <div class="container d-flex justify-content-between flex-wrap gap-2">
        <span class="small text-muted">© {{ now()->year }} LandPro Realty</span>
        <a class="small text-muted text-decoration-none" href="{{ route('admin.login') }}">Admin Panel</a>
    </div>
</footer>
</body>
</html>
