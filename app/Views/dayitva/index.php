<?= view('common/head') ?>
<div class="container mx-10">
    <table class="table table-striped">

        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
            <?php foreach ($dayitvas as $dayitva) : ?>
                <tr>
                    <td><?= ++$count; ?></td>
                    <td><?= $dayitva['name'] ?></td>
                    <td>
                    <div class="row">
                        <div class="col-auto">
                            <!-- Edit Button -->
                            <a href="<?= base_url("dayitva/edit/".$dayitva['id']) ?>" class="btn btn-primary">Edit</a>
                        </div>
                        <div class="col-auto">
                            <!-- Delete Button -->
                            <form action="<?= base_url("dayitva/delete/".$dayitva['id']) ?>" method="post">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this dayitva?')">Delete</button>
                            </form>
                        </div>
                    </div>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href=<?= base_url("dayitva/new"); ?> class="btn btn-primary">Create New Dayitva</a>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createdayitvaModal">
        Create New dayitva
    </button> -->
</div>
</body>
</html>
