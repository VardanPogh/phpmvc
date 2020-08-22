<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $data['title'] ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "pageLength": 3,
            "bLengthChange": false,
            "columnDefs": [{
                "targets": 3,
                "orderable": false
            }]
        })
    });
</script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= BASEURL; ?>">LOGO</a>
        <?= $_SESSION['login'] ?>
        <?php if($_SESSION['login'] == 'admin'){?>
        <a href="<?= BASEURL ?>/user/logout" class="btn btn-sm btn-danger">
            Logout
        </a>
        <?php }else{ ?>
        <a href="<?= BASEURL ?>/user/login" class="btn btn-sm btn-success">
            Login
        </a>
        <?php } ?>
    </div>
</nav>