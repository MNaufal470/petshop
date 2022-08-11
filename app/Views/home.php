<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="container-banner">
    <div class="container ">
        <div class="text-container">
            <h1>Natural Pet Foods</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus, et.</p>
            <a href="#" class="btn btnBuy">Shop Now</a>
        </div>
    </div>
    <div class="banner">
        <img src="https://cdn.shopify.com/s/files/1/0641/5187/9935/files/1_8e3927c0-013b-459f-88fc-9048cf975a53.png?v=1655362397"
            alt="">
    </div>
</div>
<div class="container-discount">
    <div class="container discountContent">
        <div class="items-content-l">
            <div class="titleContent">
                <h1>Nutritious <br> Dog Food</h1>
                <a href="" class="btn btnBuy py-2">Shop Now</a>
            </div>
        </div>
        <div class="items-content-2">
            <div class="titleContent-r">
                <h1>Nutritious <br> Dog Food</h1>
                <a href="" class="btn btnBuy py-2">Shop Now</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid productContainer" id="product">
    <h1 class="text-center">Best Seller</h1>
    <div class="productContent">
        <div class="listProduct">
            <?php 
                function rupiah($angka){
                    $hasil_rupiah = "Rp " . number_format($angka);
                    return $hasil_rupiah;  
                }
                ?>
            <?php foreach($product as $p): ?>
            <div class="product">
                <a href="/Home/ProductDetail/<?= $p->id ?>">
                    <div class="productSales">
                        <img src="/assets/img/product/<?=$p->photo ?>" alt="">
                    </div>
                </a>
                <div class="productDesc">
                    <h3><?=$p->nama ?></h3>
                    <span><?= rupiah($p->harga) ?></span>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <div class="advert">
            <img src="https://cdn.shopify.com/s/files/1/0641/5187/9935/files/grid03_1af5c3a9-af70-4b82-bdc1-f5658b3077b7.png?v=1653393988"
                alt="">
        </div>
    </div>
</div>
<?= $this->endSection() ?>