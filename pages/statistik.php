<?php
include '../config/database.php';
include '../partials/header.php';

// Ambil jumlah mahasiswa per jurusan
$sql = "SELECT jurusan, COUNT(*) as total FROM mahasiswa GROUP BY jurusan ORDER BY total DESC";
$result = $conn->query($sql);

// Konversi data ke format array untuk Chart.js
$jurusan = [];
$totalMahasiswa = [];
while ($row = $result->fetch_assoc()) {
    $jurusan[] = $row['jurusan'];
    $totalMahasiswa[] = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #b8860b, #d2b48c);
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <div class="flex-grow flex flex-col items-center justify-center text-center p-6">
        <h2 class="text-4xl font-bold text-white drop-shadow-lg">📊 Statistik Mahasiswa per Jurusan</h2>

        <div class="mt-6 bg-white/10 backdrop-blur-md shadow-2xl rounded-xl p-6 w-full max-w-3xl">
            <canvas id="chartMahasiswa"></canvas>
        </div>

        <div class="mt-6">
            <a href="../actions/tambah.php" 
                class="px-6 py-3 bg-green-600 text-white rounded-lg shadow-lg transform transition-all duration-300 hover:scale-110 hover:bg-green-700">
                ➕ Tambah Mahasiswa
            </a>
        </div>
        
        <!-- Tabel Data -->
        <div class="mt-10 w-full max-w-3xl bg-white/20 backdrop-blur-md shadow-lg rounded-xl p-6">
            <h3 class="text-2xl font-semibold text-white mb-4">📄 Data Statistik</h3>
            <table class="w-full border-collapse text-white">
                <thead>
                    <tr class="bg-white/30">
                        <th class="p-2 border border-gray-300">Jurusan</th>
                        <th class="p-2 border border-gray-300">Jumlah Mahasiswa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result->data_seek(0); // RESET hasil query sebelum digunakan lagi
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='bg-white/10'>";
                        echo "<td class='p-2 border border-gray-300'>{$row['jurusan']}</td>";
                        echo "<td class='p-2 border border-gray-300 text-center'>{$row['total']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php $conn->close(); ?>

    <script>
        const ctx = document.getElementById('chartMahasiswa').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($jurusan); ?>,
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: <?php echo json_encode($totalMahasiswa); ?>,
                    backgroundColor: 'rgba(76, 175, 80, 0.8)',
                    borderColor: '#4CAF50',
                    borderWidth: 2,
                    borderRadius: 10,
                    hoverBackgroundColor: 'rgba(255, 255, 255, 0.3)',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 1500,
                    easing: 'easeInOutBounce'
                },
                plugins: {
                    legend: {
                        labels: {
                            color: "white",
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: "white",
                            font: {
                                size: 12
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: "white",
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>

</body>
</html>
