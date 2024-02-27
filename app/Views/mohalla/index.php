<?= view('common/head') ?>
<div class="container mx-10">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Nagar Name</th>
                <th>Basti Name</th>
                <th>Mohalla Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
            <?php foreach ($mohallax as $mohalla): ?>
            <tr>
                <td><?= ++$count; ?></td>
                <td><?= $mohalla['nagar_name'] ?></td>
                <td><?= $mohalla['basti_name'] ?></td>
                <td><?= $mohalla['name'] ?></td>
                <td>
                    <div class="row">
                        <!-- Edit Button -->
                        <div class="col-auto">
                            <a href="<?= site_url("mohalla/edit/".$mohalla['id']) ?>" class="btn btn-primary">Edit</a>
                        </div>
                        <!-- Delete Button -->
                        <div class="col-auto">
                            <form action="<?= site_url("mohalla/delete/".$mohalla['id']) ?>" method="post">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this Mohalla?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= site_url('mohalla/new') ?>" class="btn btn-primary">Create New Mohalla</a>
</div>
</body>
</html>
