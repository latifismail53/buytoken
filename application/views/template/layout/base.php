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
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.svg') ?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.png') ?>" type="image/png" />
</head>

<body>
    <div id="app">
        <div id="main">
            <?php $this->load->view('template/include/sidebar') ?>
            <?php $this->load->view('template/include/header') ?>
            <?php $this->load->view($content) ?>
        </div>
    </div>
</body>
<script src="<?= base_url('assets/js/jquery-2.1.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/js/initTheme.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<script src="<?= base_url('assets/js/mazer.js') ?>"></script>

<script>
    $(document).ready(function() {
        $("#display").DataTable();
    });
</script>

</html>