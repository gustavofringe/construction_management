<a href="<?= BASE_URL;?>/posts/create" class="btn btn-primary"></a>
<table class="table table-inverse">
    <thead>
    <tr>
        <th>Categories</th>
        <th>Works</th>
        <th>Content</th>
        <th>Status</th>
        <th>Deadline</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($works as $work):?>
            <tr>
                <th><?php echo $categories[($work->category_id)-1]->name;?></th>
            <td><?= $work->name; ?></td>
            <td><?= $work->content; ?></td>
            <td><?= $work->status; ?></td>
            <td><?= date('d/m/Y', strtotime($work->deadline)); ?></td>
            <td>
                <form action="" method="post">
                    <a class="btn btn-primary">edit</a>
                    <a href="<?= BASE_URL;?>/posts/index/update/<?= $work->id; ?>" class="btn btn-danger">delete</a>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
