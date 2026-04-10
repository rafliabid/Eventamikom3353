<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 font-sans flex flex-col min-h-screen">

    <nav class="bg-indigo-600 shadow-md">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="text-white font-bold text-xl tracking-wider">
                    AmikomEvent<span class="text-indigo-200">Hub</span>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="/" class="text-white border-b-2 border-white pb-1 font-semibold">Home</a>
                    <a href="/profil" class="text-indigo-100 hover:text-white transition duration-300">Profil</a>
                    <a href="/katalog" class="text-indigo-100 hover:text-white transition duration-300">Katalog</a>
                    <a href="/bantuan" class="text-indigo-100 hover:text-white transition duration-300">Bantuan</a>
                    <a href="/kontak" class="text-indigo-100 hover:text-white transition duration-300">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center p-6">
        <div class="bg-white p-10 md:p-14 rounded-2xl shadow-lg border border-slate-200 text-center max-w-2xl w-full">
            
            <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <span class="text-4xl">🎉</span>
            </div>
            
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-4">
                Selamat Datang di AmikomEventHub
            </h1>
            <p class="text-lg text-slate-500 mb-8 leading-relaxed">
                Platform utama untuk menemukan, mendaftar, dan mengelola berbagai event menarik di lingkungan Universitas AMIKOM Yogyakarta.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="/katalog" class="w-full sm:w-auto bg-indigo-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-indigo-700 hover:shadow-md transition duration-300">
                    Jelajahi Event
                </a>
                <a href="/profil" class="w-full sm:w-auto bg-slate-100 text-slate-700 font-semibold py-3 px-8 rounded-lg border border-slate-300 hover:bg-slate-200 hover:shadow-sm transition duration-300">
                    Lihat Profil
                </a>
            </div>

        </div>
    </main>

    <footer class="bg-slate-800 text-slate-400 text-center py-4 text-sm mt-auto">
        &copy; 2026 AmikomEventHub - Praktikum Digital Bisnis.
    </footer>

</body>
</html>