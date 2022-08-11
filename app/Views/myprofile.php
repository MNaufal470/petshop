<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<?php $session = session();
        $success = $session->getFlashdata('success');
        $failUpdate = $session->getFlashdata('fail-update')
?>
<div class="scrumb">
    <div class="container scrumbItem">
        <h1><?=$user['nama'] ?></h1>
        <span>Home / My Profile </span>
    </div>
</div>
<div class="container">
    <div class="mt-5 pr-5 myProfile mx-auto box-shadow-1 rounded">
        <?php if($success): ?>
        <div class=" container alert alert-success text-center" role="alert">
            <?= $success ?>
        </div>
        <?php endif ?>
        <?php if($failUpdate): ?>
        <div class="container alert alert-danger text-center " role="alert">
            <h1>Something Went Wrong!</h1>
            <?php if($failUpdate) : ?>
            <?php
                        foreach ($failUpdate as $err) {
                             echo $err . ' - ';
                        } ?>

            </p>
            <?php endif ?>
        </div>
        <?php endif ?>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name*</label>
            <input type="text" class="form-control" id="exampleFormControlInput1"
                placeholder="Muhammad Naufal Sabrrudin" value="<?= $user['nama'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email*</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="naufal@gmail.com"
                value="<?= $user['email'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Address*</label>
            <input type="text" class="form-control" id="exampleFormControlInput1"
                placeholder="Muhammad Naufal Sabrrudin" value="<?= $user['alamat'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone Number*</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" value="<?= $user['no_hp'] ?>"
                disabled>
        </div>
        <div class="mt-5 ">
            <button data-bs-toggle="modal" data-bs-target="#updatePengguna<?= $user['id'] ?>"
                class="btn btn-primary w-100 ">Change My Profile</button>
        </div>
    </div>
</div>

<div class="modal fade" id="updatePengguna<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Home/UpdateUser/<?=$user['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control <?= isset( $failUpdate['nama']) ? 'is-invalid' :"" ?>"
                            placeholder="Nama Product" name="nama" value="<?= $user['nama']?>">
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
                            class="form-control"><?= $user['alamat']?></textarea>
                        <div class="invalid-feedback text-start">
                            <?php if($failUpdate){
                                if(isset( $failUpdate['alamat'])){
                                    echo $failUpdate['alamat'];
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" id=""
                            class="form-control <?= isset( $failUpdate['email']) ? 'is-invalid' :"" ?>" name="email"
                            value="<?= $user['email']?>">
                        <div class="invalid-feedback text-start">
                            <?php if($failUpdate){
                                if(isset( $failUpdate['email'])){
                                    echo $failUpdate['email'];
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Telp</label>
                        <input type="number" id=""
                            class="form-control <?= isset( $failUpdate['no_hp']) ? 'is-invalid' :"" ?>" name="no_hp"
                            value="<?= $user['no_hp']?>">
                        <div class="invalid-feedback text-start">
                            <?php if($failUpdate){
                                if(isset( $failUpdate['no_hp'])){
                                    echo $failUpdate['no_hp'];
                                }
                            } ?>
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
<?= $this->endSection() ?>