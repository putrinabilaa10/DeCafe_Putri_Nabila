<?php
  include "connect.php";
  $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
  $foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "";

  if(!empty($_POST['delete_menu_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_daftar_menu WHERE id='$id'");
    if ($query){
      unlink("../assets/img/$foto");
        $message = '<script>alert("Data Berhasil DiHapus")
                    window.location="../menu"</script>';           
    }else{
        $message = '<script>alert("Data berhasil diHapus")
                    window.location="../menu"</script>';              
    }

}echo $message;   
?>