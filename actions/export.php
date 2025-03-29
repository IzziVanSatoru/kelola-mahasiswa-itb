<?php
include '../config/database.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="mahasiswa.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Nama', 'NIM', 'Jurusan']);

$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
$conn->close();
exit();
?>
