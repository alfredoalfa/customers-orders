<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Stored in resources/views/layouts/app.blade.php -->
<head>
    <title>Crud Products - @yield('title')</title>
</head>
<body>
@section('sidebar')
    Main page
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
