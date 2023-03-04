<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Daftar Harga Token listrik</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">User</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Data User
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
        <a class="btn btn-primary float-end" href="<?= base_url('Home/addtoken') ?>">Tambah Data User</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="display" class="table table-hover  table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Harga</th>
                <th>Jumlah Kwh</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($token as $v) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td>Rp. <?= number_format($v['harga']) ?></td>
                  <td><?= $v['jumlah_kwh']; ?> Kwh</td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  $(document).ready(function() {
    $("#display").DataTable();
  });
</script>