<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>LabLoan - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
    <nav>
        <a href="{{ route('items.index') }}">Daftar Barang</a> |
        <a href="{{ route('loans.index') }}">Peminjaman</a> |
        <span>Halo, {{ auth()->user()->name }}</span> |
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>

    <div class="container">
        @if(session('success'))
            <div style="color:green;">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
