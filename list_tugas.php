<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/list.css">
    
</head>
<body>
<script>
        // Load the sidebar.html content using JavaScript
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "sidebar.html", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const sidebar = document.createElement("div");
                sidebar.innerHTML = xhr.responseText;
                document.body.insertBefore(sidebar, document.body.firstChild);
            }
        };
        xhr.send();
    </script>
    <?php
  
  // Koneksi ke database
  $koneksi = mysqli_connect("127.0.0.1", "root", "", "tugas");

  if (!$koneksi) {
      die("Koneksi gagal: " . mysqli_connect_error());
  }

  // Ambil data tugas dari database
  $query = "SELECT * FROM data_tugas";
  $result = mysqli_query($koneksi, $query);

  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          // Tampilkan setiap tugas dalam bentuk kartu
          echo "<div class='card'>";
          echo "<div class='card1'>";
          echo "<h2>" . $row['judul'] . "</h2>";
          echo "<p>Deskripsi: " . $row['deskripsi'] . "</p>";
          echo "<p>Deadline: " . $row['deadline'] . "</p>";
          echo "<p>Mata Kuliah: " . $row['mata_kuliah'] . "</p>";
          echo "<form method='post' action='hapus_tugas.php'>";
          echo "<input type='hidden' name='tugas_id' value='" . $row['id'] . "'>";
          echo "<button type='submit'>Hapus Tugas</button>";
          echo "</form>";
          echo "</div>";
      }
  } else {
      
  }

  mysqli_close($koneksi);
  ?>


</body>
</html>
