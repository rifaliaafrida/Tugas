
<?php
if (isset($_POST['tugas_id'])) {
    $tugas_id = $_POST['tugas_id'];

    // Koneksi ke database
    $koneksi = mysqli_connect("127.0.0.1", "root", "", "tugas");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Hapus tugas dari database
    $query = "DELETE FROM data_tugas WHERE id = $tugas_id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: list_tugas.php"); // Redirect kembali ke halaman tampilkan_tugas.php setelah menghapus.
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>
