<?= view('common/head'); ?>
<form action="<?= site_url('karyakartas/bydayitva') ?>" class="row g-2" method="post">
    <!-- Dropdown for Nagars -->
    <div class="col-auto form-floating">
            <select id="dayitva" name="dayitva_id" class="form-select" required>
                <?php foreach ($dayitvas as $dayitva): ?>
                    <option value="<?= $dayitva['id'] ?>"><?= $dayitva['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="dayitva">Select Dayitva:</label>
        </div>
        <!-- Add other fields as needed -->
        <div class="col-auto">
            <button class="btn btn-primary btn-lg" type="submit">Find</button>
        </div>
</form>
