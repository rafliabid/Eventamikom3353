<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Event - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen text-slate-800 font-sans">
    
    <nav class="bg-indigo-600 p-4 shadow-md">
        <div class="max-w-4xl mx-auto flex justify-center space-x-2 sm:space-x-4">
            <a href="/" class="text-white hover:bg-indigo-700 px-3 py-2 rounded-lg font-medium transition duration-300">Home</a>
            <a href="/profil" class="text-white hover:bg-indigo-700 px-3 py-2 rounded-lg font-medium transition duration-300">Profil</a>
            <a href="/katalog" class="bg-indigo-800 text-white px-3 py-2 rounded-lg font-medium shadow">Katalog</a>
            <a href="/bantuan" class="text-white hover:bg-indigo-700 px-3 py-2 rounded-lg font-medium transition duration-300">Bantuan</a>
            <a href="/kontak" class="text-white hover:bg-indigo-700 px-3 py-2 rounded-lg font-medium transition duration-300">Kontak</a>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto py-12 px-4">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-slate-800 mb-2">AmikomEventHub</h1>
            <p class="text-slate-500">Temukan dan ikuti berbagai event menarik di kampus!</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden hover:shadow-xl transition duration-300">
                <div class="bg-indigo-500 h-32 flex items-center justify-center"><span class="text-white text-3xl">🚀</span></div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">Workshop UI/UX</h2>
                    <p class="text-slate-500 text-sm mb-4">Belajar mendesain antarmuka yang ramah pengguna dengan Figma.</p>
                    <button class="w-full bg-indigo-50 text-indigo-700 font-semibold py-2 rounded hover:bg-indigo-100 transition">Daftar Sekarang</button>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden hover:shadow-xl transition duration-300">
                <div class="bg-emerald-500 h-32 flex items-center justify-center"><span class="text-white text-3xl">💻</span></div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">Seminar Web Dev</h2>
                    <p class="text-slate-500 text-sm mb-4">Mengenal framework Laravel untuk pengembangan backend modern.</p>
                    <button class="w-full bg-emerald-50 text-emerald-700 font-semibold py-2 rounded hover:bg-emerald-100 transition">Daftar Sekarang</button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden hover:shadow-xl transition duration-300">
                <div class="bg-rose-500 h-32 flex items-center justify-center"><span class="text-white text-3xl">🏆</span></div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">Hackathon 2026</h2>
                    <p class="text-slate-500 text-sm mb-4">Kompetisi membuat inovasi aplikasi dalam waktu 48 jam.</p>
                    <button class="w-full bg-rose-50 text-rose-700 font-semibold py-2 rounded hover:bg-rose-100 transition">Daftar Sekarang</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>