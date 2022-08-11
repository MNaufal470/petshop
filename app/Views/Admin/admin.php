<?= $this->extend('Admin/template') ?>
<?= $this->section('content') ?>
<?php $session = session();
        $errors = $session->getFlashdata('errors');
        $success = $session->getFlashdata('success');
?>
<div class="container mt-5">
    <?php if($errors || $success): ?>
    <div class="alert  <?= $success ? 'alert-success' : "alert-danger" ?>" role="alert">
        <?= $success ? $success : "" ?>
        <?php if($errors != null) : ?>
        <p>
            <?php
                        foreach ($errors as $err) {
                             echo $err . ' - ';
                        } ?>
        </p>
        <?php endif ?>
    </div>
    <?php endif ?>
    <div class="justifyBetween mb-2">
        <h1>Daftar Produk</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProduct">Tambah Data</button>
    </div>

    <table class="table">
        <thead class="bg-yellow">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Photo</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            <?php 
                function rupiah($angka){
                    $hasil_rupiah = "Rp " . number_format($angka);
                    return $hasil_rupiah;  
                }
                ?>
            <?php foreach($product as $p ): ?>
            <tr>
                <th><?= $i++ ?></th>
                <td><img src="/assets/img/product/<?= $p->photo ?>" alt=""
                        style="width:80px;height:80px;object-fit:contain;"></td>
                <td><?= $p->nama ?></td>
                <td style="width: 300px;"><?= $p->deskripsi ?></td>
                <td><?= rupiah($p->harga) ?></td>
                <td>
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editProduct<?=$p->id ?>">Edit</button>
                    <button class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteProduct<?=$p->id ?>">Delete</button>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="tambahProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Admin/AddItem" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Masukan Photo </label>
                        <input type="file" class="form-control" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama Product" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Deskripsi </label>
                        <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                        <input type="number" id="" class="form-control" name="harga">
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

<!-- Edit Product Modal -->
<?php foreach($product as $p ): ?>
<div class="modal fade" id="editProduct<?=$p->id ?>" tabindex=" -1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Admin/UpdateItem/<?=$p->id ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <img src="/assets/img/product/<?= $p->photo ?>"
                            style="width:300px;height:150px;object-fit:contain;" class="mb-2">
                        <input type="file" class="form-control" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama Product" name="nama"
                            value="<?=$p->nama ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Deskripsi </label>
                        <textarea name="deskripsi" id="" cols="30" rows="5"
                            class="form-control"><?=$p->deskripsi ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                        <input type="number" id="" class="form-control" name="harga" value="<?=$p->harga ?>">
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
<!-- Delete Product Modal -->
<?php foreach($product as $p ): ?>
<div class="modal fade" id="deleteProduct<?=$p->id ?>" tabindex=" -1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Admin/DeleteItem/<?=$p->id ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <img src="/assets/img/product/<?= $p->photo ?>"
                            style="width:300px;height:150px;object-fit:contain;" class="mb-2">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama Product" name="nama"
                            value="<?=$p->nama ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Deskripsi </label>
                        <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control"
                            readonly><?=$p->deskripsi ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                        <input type="number" id="" class="form-control" name="harga" value="<?=$p->harga ?>" readonly>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>
<?= $this->endSection() ?>