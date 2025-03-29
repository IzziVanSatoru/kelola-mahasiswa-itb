<?php
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    // Validasi input
    if (!empty($nama) && !empty($nim) && !empty($jurusan)) {
        $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $nim, $jurusan);

        try {
            if ($stmt->execute()) {
                echo "<script>
                        document.querySelector('.form-container').classList.add('drop-down');
                        setTimeout(() => {
                            alert('Mahasiswa berhasil ditambahkan!');
                            window.location='../pages/statistik.php';
                        }, 500);
                      </script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('Gagal menambahkan! NIM sudah ada!');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Semua kolom harus diisi!');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, #b8860b, #d2b48c);
        }
        .drop-down {
            transform: translateY(100vh);
            transition: transform 0.5s ease-in;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">

    <div class="form-container bg-white/10 backdrop-blur-md p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-white text-center mb-6">➕ Tambah Mahasiswa</h2>

        <form method="POST" action="" class="space-y-4" onsubmit="dropDownEffect()">
            <div>
                <label class="block text-white text-sm font-semibold mb-1">Nama Mahasiswa</label>
                <input type="text" name="nama" required class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-white outline-none">
            </div>

            <div>
                <label class="block text-white text-sm font-semibold mb-1">NIM</label>
                <input type="text" name="nim" required placeholder="Masukkan NIM" class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-white outline-none">
            </div>

            <div>
                <label class="block text-white text-sm font-semibold mb-1">Jurusan</label>
                <input type="text" name="jurusan" required placeholder="Masukkan jurusan" class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-white outline-none">
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg transition duration-300">
                Simpan
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="../pages/statistik.php" class="text-white hover:underline">🔙 Kembali ke Statistik</a>
        </div>
    </div>

    <script>
        function dropDownEffect() {
            document.querySelector('.form-container').classList.add('drop-down');
        }
    </script>

</body>
</html>
