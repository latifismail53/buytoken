<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Tambah Data Pelanggan</h3>
        <p class="text-subtitle text-muted">Tanggal: <?= date('d-F-Y'); ?></p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url('Pelanggan'); ?>">Kembali</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Tambah Data Pelanggan
            </li>
          </ol>
        </nav>
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
      <div class="card-body">
        <form action="<?= base_url('createp') ?>" method="post">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control" required>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="mb-3">
                <label for="username" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" required>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="mb-3">
                <label for="username" class="form-label">Nomor Handphone</label>
                <input type="number" name="nmrhp" id="nmrhp" class="form-control">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Kategori Daya Listrik</label>
            <select name="kat_daya" id="kat_daya" class="form-control" required>
              <option value="" selected>Pilih</option>
              <option value="" disabled>== R1 ==</option>
              <option value="R1-450">R-1 (450 VA)</option>
              <option value="R1-900">R-1 (900 VA)</option>
              <option value="R1-900R">R-1 (900 VA-RTM)</option>
              <option value="R1-1300">R-1 (1.300 VA)</option>
              <option value="R1-2200">R-1 (2.200 VA)</option>
              <option value="" disabled>== R2 ==</option>
              <option value="R2-3500">R-2 (3.500 VA)</option>
              <option value="R2-3600">R-2 (3.600 VA)</option>
              <option value="R2-3800">R-2 (3.800 VA)</option>
              <option value="R2-4500">R-2 (4.500 VA)</option>
              <option value="R2-5500">R-2 (5.500 VA)</option>
              <option value="" disabled>== R3 ==</option>
              <option value="R3-6500">R-3 (6.500 VA)</option>
              <option value="R3-6600">R-3 (6.600 VA)</option>
              <option value="R3-6800">R-3 (6.800 VA)</option>
              <option value="R3-7500">R-3 (7.500 VA)</option>
              <option value="R3-10500">R-3 (10.500 VA)</option>
            </select>
          </div>
          <div class="mb-3">
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>