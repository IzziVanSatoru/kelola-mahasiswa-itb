<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, #b8860b, #d2b48c);
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <?php include '../partials/header.php'; ?>

    <!-- Konten utama -->
    <main class="flex-grow p-6 text-center">
        <h1 class="text-4xl font-bold text-white drop-shadow-lg">Selamat Datang di Sistem Daftar mahasiswa ITB</h1>
        <p class="mt-4 text-lg text-white/90">Gunakan menu di atas untuk mengelola data Sistem Daftar mahasiswa.</p>
        <div class="mt-6 flex justify-center space-x-4">
            <a href="kelola.php" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:bg-blue-700">Kelola Nilai</a>
            <a href="statistik.php" class="px-6 py-3 bg-green-600 text-white rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:bg-green-700">Lihat Statistik</a>
        </div>
    </main>

</body>
</html>
