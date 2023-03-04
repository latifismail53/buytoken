<div class="content-wrapper container">
  <div class="page-heading">
    <h3>Pembelian Token Listrik <span class="text-success">Berhasil!</span></h3>
    <p class="text-subtitle text-muted">Nomor Transaksi : #<?= $kode->id_transaksi; ?></p>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-6 col-lg-12 col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>#<?= $kode->id_transaksi; ?> | <?= $kode->tgl_pembelian; ?></h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6 col-lg-6 col-md-6">
                <div class="form-group">
                  <span>No. Meter</span>
                  <h4 class="text-primary"><?= $kode->id_pel; ?></h4>
                </div>
                <div class="form-group mt-4">
                  <span>Metode Pembayaran</span>
                  <h4><?= $kode->metode_pembayaran; ?> </h4>
                </div>
              </div>
              <div class="col-6 col-lg-6 col-md-6">
                <div class="form-group">
                  <span>Prepaid Token - <?= rupiah_format($kode->harga) ?> | <?= $kode->jumlah_kwh; ?>Kwh</span>
                  <h4 class="text-primary">Rp. <?= number_format($kode->total_bayar) ?></h4>
                </div>
                <div class="form-group mt-4">
                  <span>Status Pembayaran</span>
                  <h4 class="text-success">Lunas</h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="divider">
                <div class="divider-text"></div>
              </div>
            </div>
            <p class="text-subtitle text-muted">Nomor Token</p>
            <!-- <button class="btn btn-block btn-outline-primary rounded-3 btn-copy" title="Salin Nomor Token"><span class="p-4 h3"><?= implode(' - ', str_split($kode->nomor_token, 3)); ?></span> </button> -->
            <button class="btn btn-block btn-outline-primary rounded-3 btn-copy" title="Salin Nomor Token" data-clipboard-text="<?= $kode->nomor_token ?>"><span class="p-4 h3"><?= implode(' - ', str_split($kode->nomor_token, 3)); ?></span> </button>

          </div>
        </div>
      </div>
    </section>
  </div>
</div>