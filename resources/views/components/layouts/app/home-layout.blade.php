<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="w-screen min-h-screen flex flex-col overflow-x-hidden box-border">
    {{-- Header --}}
     @include('components.layouts.app.header')
    {{-- Content --}}
    <div class="flex-1 flex flex-col w-full">
        @yield('content')
    </div>
    {{-- Footer --}}

        <footer class="bg-[#674636] text-white">
        <!-- Bagian atas -->
        <div class="bg-[#9FA29A] px-6 py-8 md:flex md:justify-between md:items-start">
            <!-- Kiri: Logo + Deskripsi -->
            <div class="flex flex-col items-start gap-4">
            <!-- Kotak Logo -->
            <div class="bg-[#F1F0E6] p-4 rounded-sm w-fit">
                <img src="/logo.png" alt="Zerobon Logo" class="w-36 h-auto" />
            </div>

            <!-- Deskripsi -->
            <p class="text-white text-base font-semibold leading-relaxed text-justify max-w-sm">
                Reducing carbon emissions through
                education, innovation and real action
                to create a greener and more sustainable world.
            </p>

             <!-- Kanan: Tombol Contact -->
            <div class="mt-1 z-10">
            <a href="#contact"
                class="bg-white text-green-700 font-bold px-6 py-2 rounded-xl border border-green-700 hover:bg-green-100 transition">
                Contact Us
            </a>
            </div>
            
            </div>


        </div>

        <!-- Copyright + Tombol Atas -->
        <div class="relative bg-[#674636] px-6 py-3 text-sm text-center border-t border-white border-opacity-20">
            <p class="text-white font-semibold opacity-80">© 2025 Zerobon | All Right Reserved.</p>
            <a href="#" class="absolute right-6 top-1/2 -translate-y-1/2 bg-green-800 hover:bg-green-700 text-white p-2 rounded transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
            </a>
        </div>
        </footer>

</body>
</html>