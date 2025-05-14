<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="w-screen min-h-screen flex flex-col">
    {{-- Header --}}
     @include('components.layouts.app.header')
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