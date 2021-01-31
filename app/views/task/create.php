<div class="container tasks">
    <div class="">
        <div class="col-md-12 text-center">
            <h1><?= $data['title']; ?></h1>
        </div>
        <div class="col-md-12">
            <?php if (isset($data['error'])) { ?>
                <p class="text-danger"><?= $data['error'] ?></p>
            <?php } ?>
            <form action="<?= BASEURL ?>task/store" method="post">
                <div class="form-group">
                    <label for="username">User Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" id="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" class="form-control" name="text" placeholder="Enter description" id="desc" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>