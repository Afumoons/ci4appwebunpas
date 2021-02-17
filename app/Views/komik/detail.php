<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Detail Komik</h2>
            <div class="card">
                <img class="card-img-top" src="/img/<?= $komik['sampul']; ?>" alt="">
                <div class="card-body">
                    <h4 class="card-title"><?= $komik['judul']; ?></h4>
                    <p class="card-text"><?= $komik['penulis']; ?></p>
                    <p class="card-text"><?= $komik['penerbit']; ?></p>

                    <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>
                    <form action="/komik/<?= $komik['id']; ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>
                    </form>
                    <br>
                    <a href="/komik">kembali ke daftar komik</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>