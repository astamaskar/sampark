<!-- app/Views/basti/index.php -->
<?= view('common/head') ?>
<div class="container mx-10">
    </?= print_r($nagarbastis) ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Nagar Name</th>
                <th>Basti Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        <?php $count = 0; ?>
        <?php foreach ($bastix as $basti): ?>
            <tr>
                <td><?= ++$count; ?></td>
                <td><?= $basti['nagar_name'] ?></td>
                <td><?= $basti['basti_name'] ?></td>
                <td>
                    <div class="row">
                        <!-- Edit Button -->
                        <div class="col-auto">
                            <a href="<?= site_url("basti/edit/".$basti['id']) ?>" class="btn btn-primary">Edit</a>
                        </div>
                        <!-- Delete Button -->
                        <div class="col-auto">
                            <form action="<?= site_url("basti/delete/".$basti['id']) ?>" method="post">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('All Mohallas for this basti will also be deleted. Are you sure you want to delete this basti?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= site_url('basti/new') ?>" class="btn btn-primary">Create New Basti</a>
</div>
</body>
</html>
