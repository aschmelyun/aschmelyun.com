<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.partials.head')
</head>
<body class="default bs-border-box">
    <div class="wrapper">
        @include('layout.partials.header')
        <main class="main-content">
            @yield('content')
        </main>
    </div>
    @include('layout.partials.footer')
</body>
</html>