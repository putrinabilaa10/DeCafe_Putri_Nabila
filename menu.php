<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_menu
    LEFT JOIN tb_kategori_menu ON tb_kategori_menu.id_kat_menu = tb_daftar_menu.kategori");
while ($row = mysqli_fetch_array($query)) {
    $result[] = $row;
}

$select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,Kategori_menu FROM tb_kategori_menu");
?>
<div class="col-lg mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Menu
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">
                        Tambah Menu
                    </button>
                </div>
            </div>
            <!-- Modal Tambah Menu Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/prosses_input_menu.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="upload foto" placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="upload foto">upload foto menu</label>
                                            <div class="invalid-feedback">
                                                Masukan file foto menu.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama menu" name="Nama_menu" required>
                                            <label for="floatingInput">Nama menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama menu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="kat_menu" required>
                                                <option selected hidden value="">pilih Kategori menu</option>
                                                <?php
                                                foreach ($select_kat_menu as $value) {
                                                    echo "<option value =" . $value['id_kat_menu'] . ">$value[Kategori_menu]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput"> kategori Menu Makanan dan Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih kategori Menu Makanan dan Minuman.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required>
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukan Harga menu.
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="stock" name="stock" required>
                                            <label for="floatingInput">Stock</label>
                                            <div class="invalid-feedback">
                                                Masukan stock.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end tambah Menu baru -->
        <?php
         if (empty($result)) {
            echo "Data Menu Makanan Atau MinumanTidak Ada";
        } else {
        foreach ($result as $row) {
        ?>
            <!-- view -->
            <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/prosses_input_menu.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['Nama_menu'] ?>">
                                            <label for="floatingInput">Nama menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama menu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['Keterangan'] ?>">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select disabled class="form-select" aria-label="Default select example">
                                                <option selected hidden value="">pilih Kategori menu</option>
                                                <?php
                                                foreach ($select_kat_menu as $value) {
                                                    if ($row['Kategori'] == $value['id_kat_menu']) {
                                                        echo "<option selected value =" . $value['id_kat_menu'] . ">$value[Kategori_menu]</option>";
                                                    } else {
                                                        echo "<option value =" . $value['id_kat_menu'] . ">$value[Kategori_menu]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput"> kategori Menu Makanan dan Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih kategori Menu Makanan dan Minuman.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['Harga'] ?>">
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukan Harga menu.
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['Stok'] ?>" >
                                            <label for="floatingInput">Stock</label >
                                            <div class="invalid-feedback">
                                                Masukan stock.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end view -->

            <!-- Edit -->
            <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/prosses_edit_menu.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="upload foto" placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="upload foto">upload foto menu</label>
                                            <div class="invalid-feedback">
                                                Masukan file foto menu.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama menu" name="Nama_menu" required value="<?php echo $row['Nama_menu'] ?>">
                                            <label for="floatingInput">Nama menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama menu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan" value="<?php echo $row['Keterangan'] ?>">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="kat_menu">
                                                <option selected hidden value="">pilih Kategori menu</option>
                                                <?php
                                                foreach ($select_kat_menu as $value) {
                                                    if ($row['Kategori'] == $value['id_kat_menu']) {
                                                        echo "<option selected value =" . $value['id_kat_menu'] . ">$value[Kategori_menu]</option>";
                                                    } else {
                                                        echo "<option value =" . $value['id_kat_menu'] . ">$value[Kategori_menu]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput"> kategori Menu Makanan dan Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih kategori Menu Makanan dan Minuman.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required value="<?php echo $row['Harga'] ?>">
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukan Harga menu.
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="stock" name="stock" required value="<?php echo $row['Stok'] ?>">
                                            <label for="floatingInput">Stock</label>
                                            <div class="invalid-feedback">
                                                Masukan stock.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit_menu_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Edit -->

            <!-- Delete -->
            <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/prosses_delete_menu.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                <input type="hidden" value="<?php echo $row['Gambar'] ?>" name="foto">
                                <div class="col-lg-12">
                                    Apakah Anda Ingin Menghapus Menu <b><?php echo $row['Nama_menu'] ?></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="delete_menu_validate" value="12345">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Delete-->

        <?php
        }
       
        ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No</th>
                            <th scope="col">gambar menu</th>
                            <th scope="col">Nama menu</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Jenis Menu</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stock</th>
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
                                    <div style="width: 90px">
                                        <img src="assets/img/<?php echo $row['Gambar'] ?>" class="img-thumbnail" alt="...">
                                    </div>
                                </td>
                                <td>
                                    <?php echo $row['Nama_menu'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Keterangan'] ?>
                                </td>
                                <td>
                                    <?php echo ($row['Jenis_Menu'] == 1) ? "Makanan" : "minuman" ?>
                                </td>
                                <td>
                                    <?php echo $row['Kategori_Menu'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Harga'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Stok'] ?>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash3"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
</div>
</div>