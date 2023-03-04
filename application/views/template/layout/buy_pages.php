<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>

  <link rel="stylesheet" href="<?= base_url('assets/css/main/app.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/main/app-dark.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/shared/iconly.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/pages/datatables.min.css'); ?>" />

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.foundation.min.css" integrity="sha512-jyhJOXPqmwwlzhhy2/7edoig3tkyTClebiDZsV2zGb5k4nBol09WyZhK7w1KLl11q79UJjPWgybVu1m52cVehw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

  <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.svg') ?>" type="image/x-icon" />
  <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.png') ?>" type="image/png" />
</head>

<body>
  <script src="<?= base_url('assets/js/pages/') ?>clipboard.min.js"></script>
  <script src="<?= base_url('assets/js/pages/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/pages/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/pages/sweetalert2.all.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/initTheme.js') ?>"></script>
  <!-- <script src="<?= base_url('assets/js/dataTables.min.js') ?>"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <?php $this->load->view('template/include/header') ?>
  <div id="app">
    <div id="main" class="layout-horizontal">
      <header class="mb-5">
        <nav class="main-navbar">
          <div class="container">
            <h4>Selamat datang </h4>
          </div>
        </nav>
      </header>

      <?php if ($this->session->flashdata('error')) : ?>
        <script>
          $(document).ready(function() {
            var error = '<?php echo $this->session->flashdata('error'); ?>';
            if (error != '') {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?php echo $this->session->flashdata('error'); ?>'
              });
            }
          });
        </script>
      <?php endif ?>
      <?php $this->load->view($content) ?>
      <footer>
        <div class="container">
          <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
              <p>2021 © Mazer Templates</p>
            </div>
            <div class="float-end">
              <p>
                Crafted with
                <span class="text-danger"><i class="bi bi-heart"></i></span>
                by <a href="">Dev[L]</a>
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="<?= base_url('assets/js/jquery-2.1.1.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/pages/sweetalert2.all.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/initTheme.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
  <script src="<?= base_url('assets/js/app.js') ?>"></script>
  <script src="<?= base_url('assets/js/mazer.js') ?>"></script>

</body>
<script>
  $(document).ready(function() {
    setTimeout(function() {
      $(".alert").alert('close');
    }, 5000);



    $("#btltransaksi").click(function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Cancel it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your Transaction has been deleted.',
            'success'
          )
          window.location.href = '<?= base_url('') ?>'
        }
      })
    });

    $("#id_pelanggan").keyup(function() {
      var id_pelanggan = $(this).val();
      if (id_pelanggan.length == 8) {
        $.ajax({
          url: "<?php echo base_url('Buy/get_nama'); ?>",
          type: "POST",
          cache: false,
          data: {
            id_pelanggan: id_pelanggan
          },
          dataType: "json",
          success: function(data) {
            $("#nama_pelanggan").text("ID valid!").css("color", "green");
          },
          error: function() {
            $("#nama_pelanggan").text('ID tidak ditemukan!').css("color", "red");
          }
        });
      } else {
        $("#nama_pelanggan").text('');
      }
    });

    $("#tabel_history").DataTable({
      "bPaginate": false,
      "bLengthChange": false,
      "searching": false,
    });



    var clipboard = new ClipboardJS('.btn-copy');

    clipboard.on('success', function(e) {
      e.clearSelection();
      swal.fire('Berhasil disalin ke clipboard!');
    });

    clipboard.on('error', function(e) {
      swal.fire('Gagal disalin ke clipboard!');
    });
  });
</script>

</html>