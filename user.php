<?php
    include("proses/connect.php");
    $query = mysqli_query($conn, "SELECT * FROM tb_user");

    while($row = mysqli_fetch_array($query)){
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
                        Tambah User
                    </button>
                </div>
            </div>
            <!-- Modal Tambah User-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end tambah -->

            <!-- view -->
            <div class="modal fade" id="ModalView" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end view -->

            <?php
                if(empty($result)){
                    echo "Data Tidak Ada";
                }else{
            ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Level</th>
                            <th scope="col">No.hp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach($result as $row) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $no++ ?>
                            </th>
                            <td>
                                <?php echo $row['nama']?>
                            </td>
                            <td>
                                <?php echo $row['username'] ?>
                            </td>
                            <td >
                                <?php echo $row['level'] ?>
                            </td>
                            <td>
                                <?php echo $row['nohp'] ?>
                            </td>
                            <td class="d-flex">
                                <button class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#ModalView"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-warning btn-sm me-2" ><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-danger btn-sm me-" ><i class="bi bi-trash3"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
    </div>
</div>
</div>