<?= $this->extend('Admin/template') ?>
<?= $this->section('content') ?>
<?php $session = session();
        $errors = $session->getFlashdata('fail');
        $success = $session->getFlashdata('success');
        $failUpdate = $session->getFlashdata('fail-update')
?>
<div class="container mt-5">
    <?php if($errors || $success || $failUpdate): ?>
    <div class="alert  <?= $success ? 'alert-success' : "alert-danger" ?>" role="alert">
        <?= $success ? $success : "" ?>
        <?php if($errors != null || $failUpdate != null ) : ?>
        <p>
            <?php if($errors) : ?>
            <?php
                        foreach ($errors as $err) {
                             echo $err . ' - ';
                        } ?>

        </p>
        <?php endif ?>
        <?php if($failUpdate) : ?>
        <?php
                        foreach ($failUpdate as $err) {
                             echo $err . ' - ';
                        } ?>

        </p>
        <?php endif ?>
        <?php endif ?>
    </div>
    <?php endif ?>
    <div class="justifyBetween mb-2">
        <h1>Daftar Pengguna</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPengguna">Tambah Pengguna</button>
    </div>

    <table class="table">
        <thead class="bg-yellow">
            <tr class="">
                <th scope="col">No.</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Role</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telp</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            <?php foreach($pengguna as $p) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $p['username'] ?></td>
                <td><?= $p['nama'] ?></td>
                <td><?= $p['role'] == 0 ? 'Pelanggan' : 'Admin' ?></td>
                <td><?= $p['alamat'] ?></td>
                <td><?= $p['no_hp'] ?></td>
                <td>
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#updatePengguna<?= $p['id'] ?>">Update</button>
                    <button class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deletePengguna<?= $p['id'] ?>">Delete</button>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Delete Pengguna Modal -->
<?php foreach($pengguna as $p) : ?>
<div class="modal fade" id="deletePengguna<?= $p['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Pangguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Admin/DeleteUser/<?=$p['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    Are You Sure Delete This User ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>
<!-- Update Pengguna Modal -->
<?php foreach($pengguna as $p) : ?>
<div class="modal fade" id="updatePengguna<?= $p['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pangguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Admin/UpdateUser/<?=$p['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control <?= isset( $failUpdate['nama']) ? 'is-invalid' :"" ?>"
                            placeholder="Nama Product" name="nama" value="<?= $p['nama']?>">
                        <div class="invalid-feedback text-start">
                            <?php if($failUpdate){
                                if(isset( $failUpdate['nama'])){
                                    echo $failUpdate['nama'];
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1"
                            class="form-label <?= isset( $failUpdate['alamat']) ? 'is-invalid' :"" ?>">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="5"
                            class="form-control"><?= $p['alamat']?></textarea>
                        <div class="invalid-feedback text-start">
                            <?php if($failUpdate){
                                if(isset( $failUpdate['alamat'])){
                                    echo $failUpdate['alamat'];
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Telp</label>
                        <input type="number" id=""
                            class="form-control <?= isset( $failUpdate['no_hp']) ? 'is-invalid' :"" ?>" name="no_hp"
                            value="<?= $p['no_hp']?>">
                        <div class="invalid-feedback text-start">
                            <?php if($failUpdate){
                                if(isset( $failUpdate['no_hp'])){
                                    echo $failUpdate['no_hp'];
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Role</label>
                        <select class="form-select" aria-label="Default select example" name="role">
                            <option selected value="<?= $p['role'] ?>"><?= $p['role'] === 0 ? "Admin" :"Member"?>
                            </option>
                            <option value="1">Admin</option>
                            <option value="0">Member</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1"
                            class="form-label <?= isset( $failUpdate['username']) ? 'is-invalid' :"" ?>">Username</label>
                        <input type="text" id="" class="form-control" name="username" value="<?= $p['username']?>">
                        <div class="invalid-feedback text-start">
                            <?php if($failUpdate){
                                if(isset( $failUpdate['username'])){
                                    echo $failUpdate['username'];
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="mb-3 w-100">
                            <label for="exampleFormControlInput1" class="form-label ">Change Password ?</label>
                            <input type="password" id="" class="form-control" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>
<!-- Add Pengguna Modal -->
<div class="modal fade" id="tambahPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pangguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Admin/AddUser" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control <?= isset($errors["nama"]) ? "is-invalid":"" ?>"
                            placeholder="Nama Pengguna" name="nama" value="<?= old('nama') ?>">
                        <div class="invalid-feedback text-start">
                            <?php if($errors){
                                if(isset( $errors['nama'])){
                                    echo $errors['nama'];
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="5"
                            class="form-control <?= isset($errors["alamat"]) ? "is-invalid":"" ?>"><?= old('alamat') ?></textarea>
                        <div class="invalid-feedback text-start">
                            <?php if($errors){
                                if(isset( $errors['alamat'])){
                                    echo $errors['alamat'];
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Telp</label>
                        <input type="number" id="" class="form-control <?= isset($errors["no_hp"]) ? "is-invalid":"" ?>"
                            name="no_hp" value="<?= old('no_hp') ?>">
                        <div class="invalid-feedback text-start">
                            <?php if($errors){
                                if(isset( $errors['no_hp'])){
                                    echo $errors['no_hp'];
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Role</label>
                        <select class="form-select" aria-label="Default select example" name="role">
                            <option selected>Open this select role</option>
                            <option value="1">Admin</option>
                            <option value="0">Member</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="text" id=""
                            class="form-control <?= isset($errors["username"]) ? "is-invalid":"" ?>" name="username"
                            value="<?= old('username') ?>">
                        <div class="invalid-feedback text-start">
                            <?php if($errors){
                                if(isset( $errors['username'])){
                                    echo $errors['username'];
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" id="" class="form-control <?= $errors ? "is-invalid":"" ?>"
                            name="password">
                        <div class="invalid-feedback text-start">
                            <?php if($errors){
                                if(isset( $errors['password'])){
                                    echo $errors['password'];
                                }
                            } ?>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection() ?>