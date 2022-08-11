<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<?php    $session = session();
            $success = $session->getFlashdata('success');?>
<?php 
                function rupiah($angka){
                    $hasil_rupiah = "Rp " . number_format($angka);
                    return $hasil_rupiah;  
                }
           
                ?>
<div class="scrumb">
    <div class="container scrumbItem">
        <h1>Shopping Cart</h1>
        <span>Home / My Shopping Cart </span>
    </div>
</div>
<div class="container mt-5 ">
    <?php if($success): ?>
    <div class=" container alert alert-success text-center" role="alert">
        <?= $success ?>
    </div>
    <?php endif ?>
    <div class="row">
        <div class="col-md-6 box-shadow bg-gray py-5 ">
            <div class="container">
                <h3 class="titleAddress">Shipping Address</h3>
                <hr>
                <div class="mt-3 pr-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name*</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Muhammad Naufal Sabrrudin" value="<?= $user['nama'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="naufal@gmail.com" value="<?= $user['email'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Address*</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Muhammad Naufal Sabrrudin" value="<?= $user['alamat'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number*</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1"
                            value="<?= $user['no_hp'] ?>" disabled>
                    </div>
                    <div class="mt-5">
                        <a href="" class="btn btn-primary">Change My Address</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 py-5">
            <div class="container  ">
                <h3 class="titleAddress text-center">Your Order</h3>
                <hr>
                <div class="productCheckout mt-3">
                    <?php if(!empty($product)) : ?>
                    <?php foreach($product as $item): ?>
                    <div class="productItem">
                        <div class="productCheckoutDetail">
                            <img src="/assets/img/product/<?= $item['photo'] ?>" alt="">
                            <div class="productCheckoutDesc">
                                <p><?= $item['nama'] ?></p>
                                <span><?= rupiah($item['harga']) ?><small style="font-size: 11px;font-weight:bold;"> x
                                    </small>
                                    <?= $item['quantity'] ?></span>
                            </div>
                        </div>
                        <div class="flex align-items-center">
                            <span data-bs-toggle="modal" data-bs-target="#deleteCart<?=$item['id'] ?>"><i
                                    class="ri-delete-bin-line iconCheckout "></i></span>
                            <span data-bs-toggle="modal" data-bs-target="#updateCart<?=$item['id'] ?>"><i
                                    class="ri-more-2-fill iconCheckout"></i></span>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <?php else : ?>
                    <div>
                        <h1 class="text-center mb-0"><i class="ri-shopping-cart-fill"></i></h1>
                        <h1 class="text-center">Your Cart is empty</h1>
                    </div>
                    <?php endif ?>
                </div>

                <div class="mt-3">
                    <?php if(!empty($product)) : ?>
                    <div class="d-flex items-center justify-content-between dotted-1 pb-2">
                        <h3>TOTAL</h3>
                        <h3><?=rupiah($total) ?></h3>
                    </div>
                    <a href="/Home/BuyCart" class="btn btnCheckout">Checkout</a>
                    <?php endif ?>
                    <a href="/Home#product" class="btn btnContinue btn-primary">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<!-- Update Stock Item -->
<?php foreach($product as $p): ?>
<div class="modal fade" id="updateCart<?=$p['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="/Home/UpdateStockItem/<?= $p['id']?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Quantity Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">Quantity</p>
                <input type="number" class="form-control" value="<?= $p['quantity']?>" min=0 name="quantity">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<?php endforeach ?>
<!-- Delete Item -->
<?php foreach($product as $p): ?>
<div class="modal fade" id="deleteCart<?=$p['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure delete this item ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="/Home/DeleteItem/<?= $p['id']?>" method="post">
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>
<?= $this->endSection() ?>