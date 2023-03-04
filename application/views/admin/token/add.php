<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Token</h3>
                <p class="text-subtitle text-muted">Halaman Tambah Daftar harga token.</p>
            </div>
        </div>
    </div>
    <section class="section">
        <?php if ($this->session->flashdata('gagal')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('gagal'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Data User</h4>
                <a class="btn btn-primary float-end" href="<?= base_url('user') ?>">Kembali</a>
            </div>
            <div class="card-body">
                <form action="<?= base_url('Home/createtoken') ?>" method="post">
                    <div class="mb-3">
                        <label for="kwh" class="form-label">Kwh</label>
                        <input type="text" name="kwh" id="kwh" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input type="text" name="harga" id="harga" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>