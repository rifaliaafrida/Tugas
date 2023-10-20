<?php
// Koneksi ke database
$koneksi = mysqli_connect("127.0.0.1", "root", "", "tugas");

// Periksa koneksi
if (mysqli_connect_error()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Terima data dari form
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$deadline = $_POST['deadline'];
$mata_kuliah = $_POST['mata_kuliah'];


// Simpan data ke database
$query = "INSERT INTO data_tugas (judul, deskripsi, deadline,mata_kuliah) VALUES ('$judul', '$deskripsi', '$deadline','$mata_kuliah')";
if (mysqli_query($koneksi, $query)) {
    echo("Berhasil Disimpan!!");
    header("Location: Input_Tugas.html");

} else {
    header("Location: index.html");
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
/ Koneksi ke database dan mengambil data tugas
// Misalnya, hasil query disimpan dalam $data_tugas


