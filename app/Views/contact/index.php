<?= view('common/head') ?>
<div class="container mx-10">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Nagar Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
            <?php foreach ($contactx as $contact): ?>
            <tr>
                <td><?= ++$count; ?></td>
                <td><div><h5><?= $contact['nagar_name'] ?></h5><?= $contact['basti_name'] ?></br><?= $contact['mohalla_name'] ?></div></td>
                <td><div><h5><?= $contact['name'] ?></h5><?= $contact['mobile'] ?></br><?= $contact['email'] ?></div></td>
                <td><div><?= $contact['house_no'] ?>, <?= $contact['colony'] ?>,</br><?= $contact['street'] ?>,</br><?= $contact['area'] ?>, <?= $contact['city'] ?></div></td>
                <td>
                    <div class="row">
                        <!-- Edit Button -->
                        <div class="col-auto">
                            <a href="<?= site_url("contact/edit/".$contact['id']) ?>" class="btn btn-primary">Edit</a>
                        </div>
                        <!-- Delete Button -->
                        <div class="col-auto">
                            <form action="<?= site_url("contact/delete/".$contact['id']) ?>" method="post">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= site_url('contact/new') ?>" class="btn btn-primary mt-3">Create New contact</a>
</div>
</body>
</html>
