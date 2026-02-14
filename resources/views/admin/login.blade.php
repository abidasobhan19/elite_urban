<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: linear-gradient(130deg, #0c2e25, #195646);
        }
        .login-card {
            width: min(460px, 94vw);
            border: 0;
            border-radius: 16px;
        }
    </style>
</head>
<body>
<div class="card login-card shadow">
    <div class="card-body p-4 p-md-5">
        <h1 class="h4 fw-bold mb-3">Admin Panel Login</h1>
        <p class="text-muted">Use admin account credentials to continue.</p>

        <form method="post" action="{{ route('admin.login.submit') }}" class="mt-4">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold" for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-success w-100">Sign In</button>
        </form>
    </div>
</div>
</body>
</html>
