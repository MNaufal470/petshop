<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<?php 
function rupiah($angka){
 $hasil_rupiah = "Rp " . number_format($angka);
return $hasil_rupiah;  
 }
 function total($p) {
    $harga = [];
    foreach($p as $h){
    $sum[] = $h['harga'] * $h['quantity'];
    array_push($harga,$sum);
}
$total = array_sum($sum);
return $total;
}
function status($p,$m){
    foreach($p as $h){
        $status = $h['status'];
    }
    if($m === "message"){

    if($status == 0){
        $message = "Order Being Processed";
    }
    if($status == 1){
        $message = "Your Order Being Shipped";
    }
    if($status == 2){
        $message = "Package Has Been Received";
    }
    }else{
        if($status == 0){
            $message = "bg-warning";
        }
        if($status == 1){
            $message = "bg-primary";
        }
        if($status == 2){
            $message = "bg-success";
        }
    }
    return $message;
}
                ?>
<div class="scrumb">
    <div class="container scrumbItem">
        <h1>My Orders</h1>
        <span>Home / My Orders </span>
    </div>
</div>
<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-12  bg-gray py-5 ">
            <div class="container">
                <h3 class="titleAddress">Transaction Details</h3>
                <hr>
                <?php if(empty($order)): ?>
                <div class="mt-5">
                    <h1 class="text-center mb-0"><i class="ri-notification-off-fill"></i></h1>
                    <h1 class="text-center capitalize">you haven't placed any orders yet</h1>
                </div>
                <?php endif ?>
                <div>
                    <div class="ordersContent">
                        <?php foreach($order as $p): ?>
                        <div class="productOrders box-shadow-1 d-flex align-items-center justify-content-between">
                            <div>
                                <?php foreach($p as $i): ?>
                                <div class="productCheckoutDetail mb-3 ">
                                    <img src="/assets/img/product/<?= $i['photo']?>" alt="">
                                    <div class="productCheckoutDesc">
                                        <p><?=$i['nama'] ?><?=$i['kode_pembelian'] ?></p>
                                        <span><?=rupiah($i['harga']) ?><small style="font-size: 11px;font-weight:bold;">
                                                x </small>
                                            <?=$i['quantity'] ?></span>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                            <div class="text-center">
                                <h3>TOTAl</h3>
                                <h3><?=rupiah(total($p))  ?></h3>
                            </div>
                            <div>
                                <span
                                    class="p-3 <?=status($p,'bg') ?> rounded fw-bold text-white"><?= status($p,'message') ?></span>
                            </div>

                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>