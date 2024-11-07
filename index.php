<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>
</head>
<body>
    <h2>Form Input Mahasiswa</h2>

    <!-- Form for inputting student data -->
    <form action="" method="POST">
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" required><br><br>

        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>

        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" required><br><br>

        <label for="no_hp">No HP:</label><br>
        <input type="text" id="no_hp" name="no_hp" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Collect form data
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];

        // File path to store CSV data
        $file_path = 'data_mahasiswa.csv';
        
        // Open the CSV file for appending
        $file = fopen($file_path, 'a');

        // If the file is empty, add the header row
        if (filesize($file_path) == 0) {
            fputcsv($file, ['NIM', 'Nama', 'Jenis Kelamin', 'Alamat', 'No HP', 'Email']);
        }

        // Write the data to the CSV file
        fputcsv($file, [$nim, $nama, $jenis_kelamin, $alamat, $no_hp, $email]);

        // Close the file
        fclose($file);

        echo "<p>Data berhasil disimpan.</p>";
    }
    ?>

    <!-- Link to download the CSV file -->
    <p><a href="data_mahasiswa.csv" download="data_mahasiswa.csv">Download File CSV</a></p>
</body>
</html>
