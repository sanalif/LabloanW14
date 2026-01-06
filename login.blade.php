<!DOCTYPE html>
<html>
<head>
    <title>Login LabLoan</title>
</head>
<body>
    <h2>Login</h2>

    @if ($errors->any())
        <div style="color: red;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- input email & password -->
        <input type="email" name="email" required />
        <input type="password" name="password" required />
        <button type="submit">Login</button>
    </form>
</body>
</html>
