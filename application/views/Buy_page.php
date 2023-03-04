<div class="content-wrapper container">
  <div class="page-heading">
    <h3>Pembelian Token Listrik</h3>

  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <?php echo form_open(base_url('Buy/payment'), ['id' => 'gotopayment']) ?>
            <div class="row mt-3">
              <div class="form-group">
                <label for="">ID Pelanggan</label>
                <input type="number" class="form-control mt-3 rounded-4" min="8" value="" name="idpelanggan" id="id_pelanggan">
              </div>
              <div class="form-group">
                <span id="nama_pelanggan"></span>
              </div>
              <div class="divider">
                <h6 class="divider-text">
                  Pilih Harga Token
                </h6>
              </div>
              <?php foreach ($tombol as $v) {
                echo $v;
              }; ?>
            </div>
            <button type="submit" class="btn btn-block btn-sm btn-success" name="btnbeli" id="btnbeli">Proses</button>

            <?php echo form_close() ?>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-9 col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Histori Pembelian</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="tabel_history" class="table table-hover table-lg">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Transaksi</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($test as $row) : ?>
                    <tr>
                      <td><?= strtoupper(hash_nama($row['nama_lengkap'])); ?></td>
                      <td>Prepaid Token (<?= $row['kwh'] ?>Kwh)</td>
                      <td><?= $row['tgl'];
                          $tgl_pembelian = strtotime(date('H:i:s', strtotime($row['tgl'])));
                          $now = time();
                          if ($now - $tgl_pembelian < 30) {
                            echo '<span class="badge badge-primary"> New!</span>';
                          } ?> </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="page-heading">
        <h3>Daftar Pembelian</h3>
      </div> -->


    </section>
  </div>
</div>