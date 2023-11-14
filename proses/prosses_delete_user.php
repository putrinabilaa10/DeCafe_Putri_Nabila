<?php
  include "connect.php";
  $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

  if(!empty($_POST['delete_user_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE id='$id'");
    if ($query){
        $message = '<script>alert("Data Berhasil DiHapus")
                    window.location="../user"</script>';           
    }else{
        $message = '<script>alert("Data berhasil diHapus")
                    window.location="../user"</script>';              
    }

}echo $message;   
?>