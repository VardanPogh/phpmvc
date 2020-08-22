<div class="container">
    <div class="jumbotron">
        <form action="<?= BASEURL ?>/task/store" method="post">
            <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label>Text</label>
                <input type="text" class="form-control" name="text" placeholder="Enter Text" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>