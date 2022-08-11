<?= $this->extend('Admin/template') ?>
<?= $this->section('content') ?>


<div class="container mx-auto mt-5">
    <div class="justifyBetween mb-2">
        <h1>Daftar Pembelian</h1>
    </div>
    <table class="table">
        <thead class="bg-yellow">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>

            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            <?php foreach($order as $o): ?>
            <tr>
                <td><?= $i++?></td>
                <?php foreach($o as $r): ?>

                <td><?= $r['nama']?></td>
                <?php endforeach ?>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>