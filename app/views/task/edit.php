<div class="container tasks">
    <div class="">
        <div class="col-md-6">
            <h1><?= $data['title']; ?></h1>
        </div>
        <div class="col-md-12">
            <p class="text-danger"><?= isset($data['error']) ? $data['error'] : '' ?></p>
            <form action="<?= BASEURL ?>task/update/<?= $data['task']['id'] ?>" method="post">
                <div class="form-group">
                    <label for="taskname">User Name:</label>
                    <input class="form-control" value="<?= $data['task']['name'] ?>" id="taskname" disabled>
                </div>
                <div class="form-group">
                    <label for="taskEmail">Email address:</label>
                    <input class="form-control" value="<?= $data['task']['email'] ?>" id="taskEmail" disabled>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="text" placeholder="Enter Description"
                           value="<?= $data['task']['text']; ?>" required id="description">
                </div>
                <div class="form-group">
                    <label for="status">Done
                        <input type="checkbox" id="status" name="status"
                               value=1 <?= $data['task']['status'] == 0 ? '' : 'checked disabled' ?>>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>