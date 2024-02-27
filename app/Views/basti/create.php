<?= view('common/head') ?>
<div class="container mx-10">
    <form action="<?= site_url('basti/create') ?>" method="post" class="form-floating row g-2">
        <div class="col-auto form-floating">
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter New Basti Name" required>
            <label for="name">Basti Name</label>
        </div>
        <!-- Dropdown for Nagars -->
        <div class="col-auto form-floating">
            <select id="nagar_id" name="nagar_id" class="form-select" required>
                <?php foreach ($nagars as $nagar): ?>
                    <option value="<?= $nagar['id'] ?>"><?= $nagar['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="nagar_id">Nagar Name</label>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-lg mb-3">Create</button>
        </div>
    </form>
</div>
</body>
</html>
