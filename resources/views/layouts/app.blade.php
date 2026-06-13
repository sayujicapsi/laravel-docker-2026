<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') · {{ config('app.name', 'Laravel') }}</title>
    <style>
        :root { --brand:#4f46e5; --brand-d:#4338ca; --bg:#f6f7fb; --border:#e5e7eb; --text:#1f2937; --muted:#6b7280; --danger:#dc2626; --danger-d:#b91c1c; }
        * { box-sizing: border-box; }
        body { margin:0; font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif; background:var(--bg); color:var(--text); }
        header.topbar { background:#fff; border-bottom:1px solid var(--border); }
        .topbar .inner { max-width:1080px; margin:0 auto; padding:14px 20px; display:flex; align-items:center; gap:24px; }
        .topbar .brand { font-weight:700; font-size:18px; color:var(--text); text-decoration:none; }
        .topbar nav { display:flex; gap:6px; }
        .topbar nav a { padding:8px 14px; border-radius:8px; color:var(--muted); text-decoration:none; font-size:14px; font-weight:500; }
        .topbar nav a:hover { background:var(--bg); color:var(--text); }
        .topbar nav a.active { background:#eef2ff; color:var(--brand); }
        .container { max-width:1080px; margin:28px auto; padding:0 20px; }
        .page-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:18px; }
        .page-head h1 { font-size:22px; margin:0; }
        .btn { display:inline-block; padding:9px 16px; border-radius:8px; border:1px solid transparent; font-size:14px; font-weight:600; cursor:pointer; text-decoration:none; line-height:1.2; }
        .btn-primary { background:var(--brand); color:#fff; } .btn-primary:hover { background:var(--brand-d); }
        .btn-light { background:#fff; color:var(--text); border-color:var(--border); } .btn-light:hover { background:var(--bg); }
        .btn-danger { background:var(--danger); color:#fff; } .btn-danger:hover { background:var(--danger-d); }
        .btn-sm { padding:6px 12px; font-size:13px; }
        .card { background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; }
        table { width:100%; border-collapse:collapse; }
        th, td { text-align:left; padding:12px 16px; font-size:14px; border-bottom:1px solid var(--border); }
        th { background:#fafafa; color:var(--muted); font-weight:600; text-transform:uppercase; font-size:12px; letter-spacing:.03em; }
        tr:last-child td { border-bottom:none; }
        tr:hover td { background:#fcfcff; }
        .actions { display:flex; gap:8px; justify-content:flex-end; }
        .empty { padding:40px; text-align:center; color:var(--muted); }
        .alert { padding:12px 16px; border-radius:8px; margin-bottom:18px; font-size:14px; }
        .alert-success { background:#ecfdf5; color:#065f46; border:1px solid #a7f3d0; }
        form.stack { background:#fff; border:1px solid var(--border); border-radius:12px; padding:24px; max-width:560px; }
        .field { margin-bottom:18px; }
        .field label { display:block; font-size:13px; font-weight:600; margin-bottom:6px; }
        .field input, .field select { width:100%; padding:9px 12px; border:1px solid var(--border); border-radius:8px; font-size:14px; }
        .field input:focus, .field select:focus { outline:none; border-color:var(--brand); box-shadow:0 0 0 3px #eef2ff; }
        .field .error { color:var(--danger); font-size:13px; margin-top:5px; }
        .field .hint { color:var(--muted); font-size:12px; margin-top:5px; }
        .form-actions { display:flex; gap:10px; margin-top:8px; }
        .muted { color:var(--muted); }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="inner">
            <a href="{{ url('/') }}" class="brand">{{ config('app.name', 'Laravel') }} Admin</a>
            <nav>
                <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">Users</a>
                <a href="{{ route('countries.index') }}" class="{{ request()->routeIs('countries.*') ? 'active' : '' }}">Countries</a>
                <a href="{{ route('cities.index') }}" class="{{ request()->routeIs('cities.*') ? 'active' : '' }}">Cities</a>
            </nav>
        </div>
    </header>

    <main class="container">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>
