<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form ubah data komik</h2>
            <form action="/komik/update/<?= $komik['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $komik['sampul']; ?>">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" name="judul" id="judul" placeholder="" autofocus value="<?= (old('judul')) ? old('judul') : $komik['judul'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control" name="penulis" id="penulis" placeholder="" value="<?= (old('penulis')) ? old('penulis') : $komik['penulis'] ?>">
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="" value="<?= (old('penerbit')) ? old('penerbit') : $komik['penerbit'] ?>">
                </div>
                <div class="form-group">
                    <label for="sampul">Sampul</label>
                    <div class="col-sm-4"><img src="/img/<?= $komik['sampul']; ?>" alt="" class="img-thumbnail img-preview"></div>
                    <div class="custom-file">
                        <input type="file" name="sampul" id="sampul" onchange="previewImg()" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('sampul'); ?>
                        </div>
                        <label for="sampul" class="custom-file-label"><?= $komik['sampul']; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary">Ubah Data</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>