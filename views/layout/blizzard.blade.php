<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.partials.head')
</head>
<body class="default blizzard bs-border-box">
    <div class="wrapper">
        @include('layout.partials.header-blizzard')
        <main class="main-content content-blizzard">
            @yield('content')
        </main>
    </div>
    @include('layout.partials.footer')
</body>
</html>