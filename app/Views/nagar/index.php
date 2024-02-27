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
            <?php foreach ($nagars as $nagar) : ?>
                <tr>
                    <td><?= ++$count; ?></td>
                    <td><?= $nagar['name'] ?></td>
                    <td>
                    <div class="row">
                        <div class="col-auto">
                            <!-- Edit Button -->
                            <a href="<?= base_url("nagar/edit/".$nagar['id']) ?>" class="btn btn-primary">Edit</a>
                        </div>
                        <div class="col-auto">
                            <!-- Delete Button -->
                            <form action="<?= base_url("nagar/delete/".$nagar['id']) ?>" method="post">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('All Bastis and Mohallas for this nagar will also be deleted. Are you sure you want to delete this Nagar?')">Delete</button>
                            </form>
                        </div>
                    </div>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href=<?= base_url("nagar/new"); ?> class="btn btn-primary">Create New Nagar</a>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createNagarModal">
        Create New Nagar
    </button> -->
</div>
<?= view('nagar/_modal') ?>
</body>
</html>
