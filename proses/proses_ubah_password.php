<?php 
session_start();
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$passwordlama = (isset($_POST['passwordlama'])) ? md5( htmlentities($_POST['passwordlama'])) : "";
$passwordbaru = (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['passwordbaru'])) : "";
$repasswordbaru = (isset($_POST['repasswordbaru'])) ? md5(htmlentities($_POST['repasswordbaru'])) : "";

// echo $_POST['passwordbaru']."<br>";
// echo $_POST['repasswordbaru'];
// exit();

if (!empty($_POST['ubah_password_validate'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_decafe]' && password = '$passwordlama'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        if($passwordbaru == $repasswordbaru){
            $query = mysqli_query($conn, "UPDATE tb_user SET password='$passwordbaru' WHERE 
            username = '$_SESSION[usename_decafe]'");
            if($query){
                $message = '<script>alert("Password berhasil diubah")
                window.history.back()</script>
                </script>';
            }else{
                $message = '<script>alert("Password gagal diubah")
                window.history.back()</script>
                </script>';
            }
        }else{
            $message = '<script>alert("Password Baru Tidak sama")
            window.history.back()</script>
            </script>';
        }
    } else { 
        $message = '<script>alert("Password Lama Tidak Sesuai")
        window.history.back()</script>
        </script>';
    }
}else{
    header('location:../home');
} echo $message;
?>
