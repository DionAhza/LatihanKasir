<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center h-screen text-white">

    <div class="text-center animate-fade-in">
        <h1 class="text-6xl font-extrabold text-red-500 mb-4">403</h1>
        <h2 class="text-2xl font-semibold mb-2">Akses Dilarang</h2>
        <p class="text-gray-400 mb-6">Sepertinya kamu tidak memiliki izin untuk mengakses halaman ini.</p>
        <a href="{{ url('/home') }}" class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-full text-white font-semibold transition-all duration-300">
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
