<?php
include '../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM mahasiswa WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/kelola.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
