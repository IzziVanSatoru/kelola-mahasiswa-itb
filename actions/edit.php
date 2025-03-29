<?php
include '../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/kelola.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Mahasiswa</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        NIM: <input type="text" name="nim" value="<?php echo $row['nim']; ?>" required><br>
        Jurusan: <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="../pages/kelola.php">Kembali</a>
</body>
</html>
