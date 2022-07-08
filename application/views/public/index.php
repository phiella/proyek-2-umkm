<div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" style="margin-top:2.5rem; margin-bottom:2.5rem">
<?php foreach ($produk as $row) : ?>
    <?php if ($row->stok > 0) : ?>
    <div class="col">
        <div class="card">
            <img class="card-img-top w-100 d-block fit-cover" src="<?= base_url('assets/images/produk/' . $row->foto) ?>">
            <div class="card-body p-4">
                <a href="<?= site_url('public/produk/detail_produk/' . $this->secure->encrypt_url($row->id)) ?>">
                <h4 class="card-title text-center"><?= $row->nama; ?></h4>
                </a>
                <p class="card-text"><?= $row->deskripsi; ?></p>
                <p class="fw-bold mb-0 text-center">Rp. <?= $row->harga_jual;?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php endforeach; ?>
</div>