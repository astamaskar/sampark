<?= view('common/head') ?>
<div class="container mx-10">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Nagar Name</th>
                <th>Basti Name</th>
                <th>Dayitva Name</th>
                <th>Karyakarta Name</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
            <?php foreach ($karyakartax as $karyakarta): ?>
            <tr>
                <td><?= ++$count; ?></td>
                <td><?= $karyakarta['nagar_name'] ?></td>
                <td><?= $karyakarta['basti_name'] ?></td>
                <td><?= $karyakarta['dayitva'] ?></td>
                <td><?= $karyakarta['name'] ?></td>
                <td><?= $karyakarta['mobile'] ?></td>
                <td>
                    <div class="row">
                        <!-- Edit Button -->
                        <div class="col-auto">
                            <a href="<?= site_url("karyakarta/edit/".$karyakarta['id']) ?>" class="btn btn-primary">Edit</a>
                        </div>
                        <!-- Delete Button -->
                        <div class="col-auto">
                            <form action="<?= site_url("karyakarta/delete/".$karyakarta['id']) ?>" method="post">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this karyakarta?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= site_url('karyakarta/new') ?>" class="btn btn-primary">Create New Karyakarta</a>
</div>
</body>
</html>
