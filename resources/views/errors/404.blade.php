<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center h-screen text-white">

    <div class="text-center animate-fade-in">
        <h1 class="text-6xl font-extrabold text-yellow-400 mb-4">404</h1>
        <h2 class="text-2xl font-semibold mb-2">Halaman Tidak Ditemukan</h2>
        <p class="text-gray-400 mb-6">Maaf, halaman yang kamu cari tidak tersedia atau sudah dipindahkan.</p>
        <a href="{{ url('/home') }}" class="px-6 py-3 bg-yellow-500 hover:bg-yellow-600 rounded-full text-white font-semibold transition-all duration-300">
            Kembali ke Beranda
        </a>
    </div>

    <style>
        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
    </style>

</body>
</html>
