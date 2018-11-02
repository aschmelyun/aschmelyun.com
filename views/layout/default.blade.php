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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-62877530-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-62877530-1');
    </script>
</body>
</html>