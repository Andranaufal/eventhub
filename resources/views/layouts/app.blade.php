<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmikomEventHub</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

    <!-- NAVBAR -->
    <nav
        class="glass sticky top-8 z-40 mx-4 mt-4 px-6 py-4 rounded-2xl border border-white/20 shadow-lg flex justify-between items-center">

        <div class="flex items-center gap-2">
            <div
                class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                AH</div>
            <span class="text-xl font-bold tracking-tight">AmikomEventHub</span>
        </div>

        <div class="hidden md:flex gap-8 font-medium">
            <a href="{{ route('home') }}" class="text-indigo-600">Jelajahi</a>

            <!-- FIX -->
            <a href="{{ url('/') }}#kategori" class="hover:text-indigo-600 transition">
                Kategori
            </a>

            <a href="{{ url('/') }}#tentang" class="hover:text-indigo-600 transition">
                Tentang Kami
            </a>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('admin.dashboard') }}"
                class="px-5 py-2.5 rounded-xl font-semibold hover:bg-slate-200 transition">
                Admin Panel
            </a>
        </div>
    </nav>

    <!-- CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="bg-indigo-900 text-indigo-100 py-20 px-6 mt-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="space-y-4 col-span-2">
                <div class="flex items-center gap-2">
                    <div
                        class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                        AH</div>
                    <span class="text-2xl font-bold text-white">AmikomEventHub</span>
                </div>
                <p class="max-w-xs text-indigo-300">
                    Platform reservasi tiket event online terbaik untuk mahasiswa dan profesional.
                </p>
            </div>

            <div>
                <h4 class="text-white font-bold mb-6">Navigasi</h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ url('/') }}#kategori" class="hover:text-white">Kategori</a></li>
                    <li><a href="{{ url('/') }}#tentang" class="hover:text-white">Tentang</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-6">Kontak</h4>
                <ul class="space-y-4">
                    <li>support@event.com</li>
                    <li>+62 812 3456 7890</li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>