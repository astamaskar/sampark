<?= view('common/head'); ?>
<form action="<?= site_url('karyakartas/bynagar') ?>" class="row g-2" method="post">
    <!-- Dropdown for Nagars -->
    <div class="col-auto form-floating">
            <select id="nagar" name="nagar_id" class="form-select" required>
                <?php foreach ($nagars as $nagar): ?>
                    <option value="<?= $nagar['id'] ?>"><?= $nagar['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="nagar">Select Nagar:</label>
        </div>
        <!-- Add other fields as needed -->
        <div class="col-auto">
            <button class="btn btn-primary btn-lg" type="submit">Find</button>
        </div>
</form>
