<?= view('common/head') ?>
<div class="container mx-10">
    <form action=<?= site_url('basti/update/'.$basti['id']) ?> class="row g-2" method="post">
        <div class="col-auto form-floating">
            <input type="text" id="name" name="name" class="form-control" value=<?= $basti['name'] ?>  required>
            <label for="name">Basti Name</label>
        </div>
        <div class="col-auto form-floating">
            <!-- Dropdown for Nagars -->
            <select id="nagar_id" name="nagar_id" class="form-select" required>
                <?php foreach ($nagars as $nagar): ?>
                    <option value="<?= $nagar['id'] ?>" <?= $nagar['id']==$basti['nagar_id'] ? "selected" : "" ?>> <?= $nagar['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="nagar_id">Nagar Name</label>
        </div>
        <div class="col-auto">
            <button id="update" type="submit" class="btn btn-primary btn-lg mb-3">Update</button>
        </div>
    </form>
</div>
</body>
</html>
