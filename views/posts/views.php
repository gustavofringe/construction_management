<a href="<?= BASE_URL;?>/posts/create" class="btn btn-primary">Create project</a>
<table class="table table-inverse">
    <thead>
    <tr>
        <th>Categories</th>
        <th>Foreman</th>
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
                <th><?= $categories[($work->category_id)-1]->name;?></th>
                <th><?= $foremans[($work->foreman_id)-1]->name;?></th>
            <td><?= $work->id; ?></td>
            <td><?= $work->content; ?></td>
            <td><?= $work->status; ?></td>
            <td><?= date('d/m/Y', strtotime($work->deadline)); ?></td>
            <td>
                <form action="" method="post">
                    <a href="<?= BASE_URL;?>/posts/views/delete/<?= $work->id; ?>" class="btn btn-danger">delete</a>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
