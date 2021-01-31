<div class="container tasks">
    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class=""><?= $data['title']; ?></h1>
        </div>
        <div class="col-md-12">
            <a href="<?= BASEURL ?>task/create" class="btn btn-primary">
                Create New Task
            </a>
        </div>
        <div class="col-md-12">
            <div class="table-responsive mt-5">
                <table id="tasksTable" class="display table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th scope="col" class="column-sort" data-sort="id">Id</th>
                        <th scope="col" class="column-sort" data-sort="name">Name</th>
                        <th scope="col" class="column-sort" data-sort="email">Email</th>
                        <th scope="col" class="column-sort" data-sort="text">Text</th>
                        <th scope="col" class="column-sort" data-sort="status">Status</th>
                        <th scope="col" class="column-sort" data-sort="is_edited">Edited</th>
                        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') { ?>
                            <th scope="col">Action</th><?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($data['task']) {
                        foreach ($data['task'] as $key => $value) {
                            ?>
                            <tr>
                                <td><?= $value['id']; ?></td>
                                <td><?= $value['name']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td><?= $value['text']; ?></td>
                                <td><?= $value['status'] == 0 ? 'In Progress' : 'Done' ?></td>
                                <td> <?= $value['is_edited'] ? '<span>Edited</span>' : '-' ?></td>
                                <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') { ?>
                                    <td class="actions">
                                        <a href="<?= BASEURL; ?>task/edit/<?= $value['id']; ?>"
                                           class="btn btn-sm btn-warning edit-task">Edit</a>
                                        <form action="<?= BASEURL; ?>task/destroy/<?= $value['id'] ?>" method="post">
                                            <button class="btn btn-sm btn-danger delete-task">Delete</button>
                                        </form>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>
                <div class="mt-5 float-right">
                    <?php
                    if ($data['count']) {
                        for ($i = 1; $i <= $data['count']; $i++) {
                            ?>
                            <span><button class="pageButton btn btn-info btn-sm" data-id="<?= $i ?>">
                            <?= $i ?></button></span>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
