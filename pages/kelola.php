<?php
include '../config/database.php';
include '../partials/header.php';

// Ambil data mahasiswa dari database
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Nilai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, #b8860b, #d2b48c);
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <div class="flex-grow flex flex-col items-center justify-center text-center p-6">
        <h2 class="text-4xl font-bold text-white drop-shadow-lg">Daftar Mahasiswa</h2>

        <div class="overflow-x-auto mt-6 w-full max-w-4xl">
            <table class="w-full border-collapse bg-white/10 backdrop-blur-md shadow-lg rounded-xl overflow-hidden">
                <thead>
                    <tr class="bg-black/30 text-white uppercase text-sm tracking-wide">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Nama</th>
                        <th class="py-3 px-4">NIM</th>
                        <th class="py-3 px-4">Jurusan</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr class="border-b border-white/20 text-white hover:bg-white/20 transition-all transform hover:scale-[1.02]">
                            <td class="py-3 px-4"><?php echo $row['id']; ?></td>
                            <td class="py-3 px-4"><?php echo $row['nama']; ?></td>
                            <td class="py-3 px-4"><?php echo $row['nim']; ?></td>
                            <td class="py-3 px-4"><?php echo $row['jurusan']; ?></td>
                            <td class="py-3 px-4 flex justify-center space-x-2">
                                <a href="../actions/edit.php?id=<?php echo $row['id']; ?>" class="px-3 py-2 bg-blue-600 text-white rounded-lg shadow-md transition-transform transform hover:scale-105 hover:bg-blue-700">Edit</a>
                                <a href="../actions/hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Hapus data ini?');" class="px-3 py-2 bg-red-600 text-white rounded-lg shadow-md transition-transform transform hover:scale-105 hover:bg-red-700">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex space-x-4">
            <a href="../actions/tambah.php" class="px-6 py-3 bg-green-600 text-white rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:bg-green-700">Tambah Mahasiswa</a>
            <a href="index.php" class="px-6 py-3 bg-gray-600 text-white rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:bg-gray-700">Kembali</a>
        </div>
    </div>

</body>
</html>

<?php
$conn->close();
?>
