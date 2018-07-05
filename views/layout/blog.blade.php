<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.partials.head')
</head>
<body class="default bs-border-box">
    <div class="wrapper">
        <a href="/" class="home-link">AS</a>
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</body>
</html>