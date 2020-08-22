<div class="container">
    <div class="jumbotron">
        <h1>Login</h1>
        <form action="<?= BASEURL ?>/user/auth" method="post">
            <div class="form-group">
                <label>Login</label>
                <input type="text" class="form-control" name="login" placeholder="Enter login" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <p style="color:red"><?= $data['error'] ?></p>
        </form>
    </div>
</div>