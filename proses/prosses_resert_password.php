<?php
  include "connect.php";
  $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

  if(!empty($_POST['delete_user_validate'])){
    $query = mysqli_query($conn, "UPDATE tb_user SET password='$passwordbaru' WHERE  id='$id'");
    if ($query){
        $message = '<script>alert("password berhasil di resert")
                    window.location="../user"</script>'; 
                    exit();          
    }else{
        $message = '<script>alert("password gagal di resert")
                    window.location="../user"</script>';              
    }

}echo $message;   
?>