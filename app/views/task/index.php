<div class="container">
    <div class="jumbotron mt-4">
        <h1 class="display-4"><?= $data['title']; ?></h1>

        <a href="<?= BASEURL ?>/task/create" class="btn btn-sm btn-primary">
            New
        </a>

        <div class="table-responsive mt-5">
            <table id="myTable" class="display" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Text</th>
                    <th scope="col">Status</th>
                    <?php if ($_SESSION['login'] == 'admin') { ?>
                        <th scope="col">Action</th><?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['task'] as $key => $value): ?>
                    <tr>
                        <th scope="row"><?= ++$key; ?></th>
                        <td><?= $value['name']; ?></td>
                        <td><?= $value['email']; ?></td>
                        <td><?= $value['text']; ?></td>
                        <td><?= $value['status'] == 0 ? 'Review' : 'Done'; ?></td>
                        <?php if ($_SESSION['login'] == 'admin') { ?>
                            <td>
                                <a href="<?= BASEURL; ?>/task/edit/<?= $value['id']; ?>"
                                   class="btn btn-xs btn-info">Edit</a>
                                <form action="<?= BASEURL; ?>/task/destroy/<?= $value['id'] ?>" method="post">
                                    <button class="btn btn-xs btn-danger">Delete</button>
                                </form>
                            </td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
