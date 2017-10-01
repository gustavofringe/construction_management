
<?php if(isset($cat)): ?>
<h1><?php echo $categories[$cat]->name;?></h1>

<?php endif;?>
<table class="table table-inverse">
    <thead>
    <tr>
        <th>Works</th>
        <th>Content</th>
        <th>Status</th>
        <th>Deadline</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($works as $work):?>
        <?php if($work->online == 1): ?>
    <tr>
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
        <?php endif;?>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>