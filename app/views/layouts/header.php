<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $data['title'] ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>public/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>public/assets/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <?php if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin'){?>
        <a href="<?= BASEURL ?>user/logout" class="btn btn-danger">
            Logout
        </a>
        <?php }else{ ?>
        <a href="<?= BASEURL ?>user/login" class="btn btn-success">
            Login
        </a>
        <?php } ?>
    </div>
</nav>