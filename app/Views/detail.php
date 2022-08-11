<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<?php 
                function rupiah($angka){
                    $hasil_rupiah = "Rp " . number_format($angka);
                    return $hasil_rupiah;  
                }
             
                ?>
<div class="scrumb">
    <div class="container scrumbItem">
        <h1>Product</h1>
        <span>Home / Best Sellers / <?= $product->nama ?></span>
    </div>
</div>

<div class="productDetail ">
    
    <div class="detailContent container">
        <img src="/assets/img/product/<?= $product->photo ?>" alt="">
        <div class="detailDesc">
            <h1><?=$product->nama ?></h1>

            <form class="detailSpec mt-3" action="/Home/AddToCart/<?=$product->id ?>" method="post">
                <div class="row">
                    <div class="col-3">
                        <p>Price</p>
                    </div>
                    <div class="col-6">
                        <p>: <?= rupiah($product->harga) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p>Vendor</p>
                    </div>
                    <div class="col-6">
                        <p>: Petshopqu</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p>Availability</p>
                    </div>
                    <div class="col-6">
                        <p>:
                            <span class="text-success">In stock!</span>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p>Quantity</p>
                    </div>

                    <div class="col-6">
                        :
                        <input type="number" min="1" max="10" value="1" name="quantity"
                            style="outline:none;border:2px solid black;text-align:center;">
                    </div>
                </div>
                <div class="row">
                    <p>Description <br><?=$product->deskripsi ?></p>
                </div>
                <div class="row mt-5">
                    <div class="col-6">
                        <button type="submit" class="btn btnBuy">Add To Cart</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>