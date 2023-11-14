  <?php
  include "connect.php";
  $nama_menu = (isset($_POST['Nama_menu'])) ? htmlentities($_POST['Nama_menu']) : "";
  $keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
  $kat_menu = (isset($_POST['kat_menu'])) ? htmlentities($_POST['kat_menu']) : "";
  $harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
  $stok = (isset($_POST['stock'])) ? htmlentities($_POST['stock']) : "";
  
  $kode_rand = rand(10000,99999)."-";
  $target_dir = "../assets/img/".$kode_rand;
  $target_file = $target_dir.basename($_FILES['foto']['name']);
  $imagetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (!empty($_POST['input_menu_validate'])) {
    // cek apakah gambar atau bukan
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
      $massage = "ini bukan file gambar";
      $statusUpload = 0;
    } else {
      $statusUpload = 1;
      if (file_exists($target_file)) {
        $massage = "maaf,file yg di masukan sudah ada";
        $statusUpload = 0;
      } else {
        if ($_FILES['foto']['size'] > 500000) { //500kb
          $massage = "file gambar yg di Upload terlalu besar";
        } else {
          if ($imagetype != "jpg" && $imagetype != "png" && $imagetype != "jpeg" && $imagetype != "gif") {
            $massage = " maaf,hanya di perbolehkan gambar yg di miliki format JPG,JEPG, PNG, GIF";
            $statusUpload = 0;
          }
        }
      }
    }
    if ($statusUpload == 0) {
      $massage = '<script>alert("' . $massage . ' gambar tidak dapat di upload")
                window.location="../menu"</script>';
    } else {
      $select = mysqli_query($conn, "SELECT * FROM tb_daftar_menu WHERE Nama_menu = '$nama_menu'");
      if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Nama menu yang dimasukkan sudah ada")
        window.location="../menu"</script>';
      } else {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
          $query = mysqli_query($conn, "INSERT INTO tb_daftar_menu (Gambar,Nama_menu,Keterangan,Kategori,Harga,Stok) values ('" .$kode_rand. $_FILES['foto']['name'] . "','$nama_menu','$keterangan','$kat_menu','$harga','$stok')");
          if ($query) {
            $message = '<script>alert("Data Berhasil dimasukkan")
                      window.location="../menu" </script>';
          } else {
            $message = '<script>alert("Data Gagal dimasukkan")
                      window.location="../menu" </script>';
          }
        } else {
          $message = '<script>alert("Maaf, Terjadi Kesalahan File Tidak Dapat Diuploud ")
                      window.location="../menu" </script>';
        }
      }
    }
  }
  echo $message;
  ?>
