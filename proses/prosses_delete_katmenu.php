<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['delete_kategori_validate'])) {
  $select = mysqli_query($conn, "SELECT Kategori FROM tb_daftar_menu WHERE Kategori = '$id'");
  if (mysqli_num_rows($select) > 0) 
  {
    $message = '<script>alert("Kategori Telah Digunakan Pada Daftar Menu. Kategori TidaK Dapat Dihapus");
                window.location="../katmenu"</script>';
  } 
  else 
  {
    $query = mysqli_query($conn, "DELETE FROM tb_kategori_menu WHERE id_kat_menu='$id'");
    if ($query)
     {
      $message = '<script>alert("Data Berhasil DiHapus")
                    window.location="../katmenu"</script>';
    } 
    else 
    {
      $message = '<script>alert("Data berhasil diHapus")
                    window.location="../katmenu"</script>';
    }
  }
}
echo $message;
