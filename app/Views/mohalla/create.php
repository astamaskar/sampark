<?= view('common/head') ?>
<div class="container mx-10">
    <form action="<?= site_url('mohalla/create') ?>" class="row g-2" method="post">
        <div class="col-auto form-floating">
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter New Mohalla Name" required>
            <label for="name">Mohalla Name</label>
        </div>
        <!-- Dropdown for Nagars -->
        <div class="col-auto form-floating">
            <select id="nagar" name="nagar_id" class="form-select" hx-get="/sampark/public/getbastis" hx-target="#basti" hx-swap="innerHTML" required>
                <?php foreach ($nagars as $nagar): ?>
                    <option value="<?= $nagar['id'] ?>"><?= $nagar['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="nagar">Select Nagar:</label>
        </div>
        <!-- Dropdown for Bastis -->
        <div class="col-auto form-floating">
            <select class="form-select" id="basti" name="basti_id" required>
                <?php foreach ($bastis as $basti): ?>
                    <option value="<?= $basti['id'] ?>"><?= $basti['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="basti">Select Basti:</label>
        </div>
        <!-- Add other fields as needed -->
        <div class="col-auto">
            <button class="btn btn-primary btn-lg" type="submit">Create</button>
        </div>
    </form>
</div>
</body>

</html>
