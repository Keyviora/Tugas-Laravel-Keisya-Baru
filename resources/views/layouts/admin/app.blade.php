<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    @include('layouts.admin.css')
</head>
<body>
    @include('layouts.admin.sidebar')
    
    <main class="content">
        @include('layouts.admin.header')
        
        @yield('content')
        
        @include('layouts.admin.footer')
    </main>

    @include('layouts.admin.js')
</body>
</html>