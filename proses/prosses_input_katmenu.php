<?php
  include "connect.php";
  $jenismenu = (isset($_POST['jenismenu'])) ? htmlentities($_POST['jenismenu']) : "";
  $katmenu = (isset($_POST['katmenu'])) ? htmlentities($_POST['katmenu']) : "";

  if(!empty($_POST['input_katmenu_validate'])){
    $select = mysqli_query($conn, "SELECT Kategori_Menu FROM tb_kategori_menu WHERE Kategori_Menu = '$katmenu'");
    if(mysqli_num_rows($select)> 0){
      $message = '<script>alert("Kategori Menu yang dimasukkan sudah ada")
      window.location="../katmenu"</script>';   
    }else{

    $query = mysqli_query($conn, "INSERT INTO tb_kategori_menu (Jenis_Menu,Kategori_Menu)values('$jenismenu','$katmenu')");
    if ($query){
        $message = '<script>alert("Data berhasil dimasukkan")
                    window.location="../katmenu"
                    </script>';           
    }else{
        $message = '<script>alert("Data gagal dimasukkan")
                    window.location="../katmenu"
                    </script>';              
    }}

}echo $message;   
?>