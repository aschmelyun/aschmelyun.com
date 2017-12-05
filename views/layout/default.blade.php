<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.partials.head')
    <style>
        body {
            font-family: "Roboto", sans-serif;
            background: #f5f5f5;
            color: #212121;
        }
        .font-alt {
            font-family: "Source Serif Pro", serif;
        }
        .particles-js-canvas-el {
            position: fixed;
        }
    </style>
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