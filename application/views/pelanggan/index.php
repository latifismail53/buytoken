<div class="content-wrapper container">
  <div class="page-heading">
    <h3>Pembelian Token Listrik</h3>
  </div>
  <div class="page-content">
    <?= form_open(base_url('buy/process_payment'), ['method' => 'POST']) ?>
    <?= form_hidden('id_pelanggan', $idpel) ?>
    <?= form_hidden('id_token', $idtoken) ?>
    <?= form_hidden('jumlah_kwh', $jmlkwh) ?>
    <?= form_hidden('total', $totalharga) ?>
    <section class="row">
      <div class="col-6 col-lg-12 col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Konfrimasi Pembayaran</h4>
            <p class="text-subtitle text-muted">Pembelian tanggal : <?= date('d-m-Y') ?></p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6 col-lg-6 col-md-6">
                <div class="form-group">
                  <span>No. Meter</span>
                  <h5><?= $idpel; ?></h5>
                </div>
                <div class="form-group mt-4">
                  <span>Nama</span>
                  <h5><?= hash_nama(strtoupper($nama)); ?></h5>
                </div>
              </div>
              <div class="col-6 col-lg-6 col-md-6">
                <div class="form-group">
                  <span>Prepaid Token - <?= rupiah_format($harga); ?> (<?= $idpel ?>)</span>
                  <h5>Rp. <?= number_format($harga); ?></h5>
                </div>
                <div class="form-group mt-4">
                  <span>Admin Fee</span>
                  <h5>Rp. 2000</h5>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="divider">
                <div class="divider-text"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <h5>Total Pembayaran</h5>
              </div>
              <div class="col-6">
                <h5>Rp. <?= number_format($totalharga); ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h6>Detail Transaksi</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="" class="mb-2">Email</label>
                  <input type="text" placeholder="Email Valid" class="form-control" name="email">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="" class="mb-2">Nomor Handphone</label>
                  <input type="number" placeholder="Nomor aktif" class="form-control" name="nohp">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="mb-2">Metode Pembayaran</label>
              <select class="form-control" id="metode_pembayaran" name="metode_pembayaran">
                <option value="transfer_bank">Transfer Bank</option>
                <option value="kartu_kredit">Kartu Kredit</option>
                <option value="paypal">PayPal</option>
              </select>
            </div>
            <div class="float-start">
              <button type="submit" class="btn btn-primary mt-3">Bayar</button>
            </div>
            <?= form_close() ?>
            <div class="float-end">
              <button class="btn btn-outline-danger mt-3" type="button" id="btltransaksi">Batalkan</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>