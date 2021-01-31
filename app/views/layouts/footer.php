<script type="text/javascript" src="<?= BASEURL; ?>/public/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= BASEURL ?>/public/assets/js/script.js"></script>
<script type="text/javascript">
    window.baseUrl = "<?= BASEURL ?>";
    window.isAdmin = "<?= isset($_SESSION['login']) && $_SESSION['login'] == 'admin' ? true : false ?>";
    window.orderBy = 'id';
    window.orderByType = 'asc';
</script>
</body>
</html>