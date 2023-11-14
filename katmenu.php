<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_kategori_menu");

while ($row = mysqli_fetch_array($query)) {
    $result[] = $row;
}
?>
<div class="col-lg mt-2">
    <div class="card">
        <div class="card-header">
            Halaman User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">
                        Tambah Kategori Menu
                    </button>
                </div>
            </div>
            <!-- Modal Tambah Kategori-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/prosses_input_katmenu.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="jenismenu" id="">
                                                <option value="1">Makanan</option>
                                                <option value="2">Minuman</option>
                                            </select>
                                            <label for="floatingInput">Jenis Menu</label>
                                            <div class="invalid-feedback">
                                                Pilih Jenis Menu.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input  type="text" class="form-control" id="floatingInput" placeholder="Kategori Menu" name="katmenu" required>
                                            <label for="floatingInput">Kategori Menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kategori Menu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_katmenu_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end tambah Kategori -->
            <?php
            foreach ($result as $row) {
            ?>

                <!-- Edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['id_kat_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Data Kategori Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/prosses_edit_katmenu.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id_kat_menu'] ?>" name="id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="jenismenu" id="">
                                                <?php
                                                $data = array("Makanan","Minuman");
                                                foreach($data as $key => $value){
                                                    if($row['Jenis_Menu']==$key+1){
                                                        echo "<option selected value=".($key+1).">$value</option>";
                                                    }else{
                                                        echo "<option value=".($key+1).">$value</option>";
                                                    }
                                                }
                                                ?>
                                                </select>
                                            <label for="floatingInput">Jenis Menu</label>
                                            <div class="invalid-feedback">
                                                Pilih Jenis Menu.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input  type="text" class="form-control" id="floatingInput" placeholder="Kategori Menu" name="katmenu" required value="<?php echo $row['Kategori_Menu'] ?>">
                                            <label for="floatingInput">Kategori Menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kategori Menu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit_katmenu_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Edit -->

                 <!-- Delete -->
                 <div class="modal fade" id="ModalDelete<?php echo $row['id_kat_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete data Kategori Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/prosses_delete_katmenu.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_kat_menu'] ?>" name="id">
                                    <div class="col-lg-12">
                                        Apakah Anda Ingin Menghapus Kategori <b><?php echo $row['Kategori_Menu'] ?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" 
                                        data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_kategori_validate" value="12345">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Delete-->

            <?php
            }
            if (empty($result)) {
                echo "Data Tidak Ada";
            } else {
            ?>
                <!-- Table Daftar Kategori Menu -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Menu</th>
                                <th scope="col">Kategori Menu</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $no++ ?>
                                    </th>
                                    <td>
                                        <?php echo ($row['Jenis_Menu']==1) ? "Makanan" : "Minuman" ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Kategori_Menu'] ?>
                                    </td>
                                    <td class="d-flex">
                                        <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_kat_menu'] ?>"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_kat_menu'] ?>"><i class="bi bi-trash3"></i></button>
                                    </td>
                                </tr>
                            <?php
                         } 
                         ?>
                        </tbody>
                    </table>
                </div>
                 <!-- Akhir Table Daftar Kategori Menu -->
            <?php
         } 
         ?>
        </div>
    </div>
</div>