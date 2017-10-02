<h1>Create project</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li>
                    <?= $error; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form action="" method="post"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title">
        </div>
        <div class="form-group">
            <label for="url">Url</label>
            <input type="text" class="form-control" id="url" placeholder="Url" name="url">
        </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" id="category" value="" name="category_id">
            <?php foreach ($categories as $category): ?>
                <option class="nav-link" value="<?= $category->id?>"><?= $category->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="foreman">Foreman</label>
        <select class="form-control" id="foreman" value="" name="foreman_id">
            <?php foreach ($foremans as $foreman): ?>
                <option class="nav-link" value="<?= $foreman->id?>"><?= $foreman->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="file">Upload document</label>
        <input type="file" class="form-control-file" id="file" name="file">
    </div>
    <div class="input-group date form-group" id="datepicker" data-provide="datepicker" data-date-format="yyyy-mm-dd">
        <label for="date">Deadline</label>
        <input type="text" class="form-control" id="date" name="date" readonly>
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <!-- /# -->
    </div>
    <!-- /.form-group -->
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
