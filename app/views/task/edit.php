<div class="container">
    <div class="jumbotron">
        <form action="<?= BASEURL ?>/task/update/<?= $data['task']['id'] ?>" method="post">
            <div class="form-group">
                <label>User Name</label>
                <p><?= $data['task']['name'] ?></p>
            </div>
            <div class="form-group">
                <label>Email address</label>
                <p><?= $data['task']['email'] ?></p>
            </div>
            <div class="form-group">
                <label>Text</label>
                <input type="text" class="form-control" name="text" placeholder="Enter Text"
                       value="<?= $data['task']['text']; ?>" required>
            </div>
            <?php if ($data['task']['status'] == 0) { ?>
                <input type="checkbox" id="status" name="status" value=1>
                <label for="status"> Done </label><br>
            <?php } else { ?>
                <p style="color:green">Done</p>
            <?php } ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>