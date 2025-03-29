<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="w-screen min-h-screen flex flex-col">
    {{-- Header --}}
    <div>
        @include('components.layouts.app.header')
    </div>
    {{-- Content --}}
    <div class="flex-1">
        @yield('content')
    </div>
    {{-- Footer --}}
    <div>
        Ini footer
    </div>
</body>
</html>