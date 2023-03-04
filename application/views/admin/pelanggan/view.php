<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Pelanggan</h3>
        <p class="text-subtitle text-muted">Halaman Data Pelanggan.</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url('home'); ?>">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Data Pelanggan
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section class="section">
    <?php if ($this->session->flashdata('berhasil')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('berhasil'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    <div class="card">
      <div class="card-header">
        <a class="btn btn-primary float-end" href="<?= hash_url('addp', 'tambahpelanggan') ?>">Tambah Data</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="display" class="table table-hover dataTable table-borderedless">
            <thead>
              <tr>
                <th>No</th>
                <th>ID Pelanggan</th>
                <th>Nomor Meter</th>
                <th>Daya</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No. Handphone</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($loadpel as $v) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td class="text-success fw-bold"><?= $v['id_pel'] ?></td>
                  <td><?= $v['no_meter'] ?></td>
                  <td><?= $v['kat_daya'] . ' (' . substr($v['kat_daya'], 3) . ' VA)'  ?></td>
                  <td><?= strtoupper($v['nama_lengkap']) ?></td>
                  <td><?= $v['email'] ?? '-' ?></td>
                  <td><?= $v['no_handphone'] ?? '-' ?></td>
                  <td><button class="btn btn-success btn-sm">Active</button></td>
                </tr>
              <?php endforeach ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </section>
</div>