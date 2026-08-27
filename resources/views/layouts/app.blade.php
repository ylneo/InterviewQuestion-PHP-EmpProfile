<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Employee Profiles')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('employees.index') }}" class="navbar__brand">Employee Profiles</a>
        <a href="{{ route('employees.create') }}" class="navbar__link">+ Add Employee</a>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>