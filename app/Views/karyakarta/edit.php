<?= view('common/head') ?>
<div class="container mx-10">
    <form action=<?= site_url('karyakarta/update/'.$thiskaryakarta['id']) ?> class="row g-2" method="post">
        <!-- Dropdown for Nagars -->
        <div class="col-md-4 form-floating">
            <select id="nagar" name="nagar_id" class="form-select" hx-get="/sampark/public/getbastis" hx-target="#basti" hx-swap="innerHTML" required>
            <?php foreach ($nagars as $nagar): ?>
                    <option value="<?= $nagar['id'] ?>" <?= $nagar['id'] == $thisNagar['id'] ? "Selected" : "" ?>><?= $nagar['name'] ?></option>
            <?php endforeach; ?>
            </select>
            <label for="nagar">Select Nagar</label>
        </div>
        <!-- Dropdown for Bastis -->
        <div class="col-md-4 form-floating">
            <select id="basti" name="basti_id" class="form-select" required>
            <?php foreach ($bastis as $basti): ?>
                <option value="<?= $basti['id'] ?>"<?= $basti['id'] == $thisBasti['id'] ? "Selected" : "" ?> ><?= $basti['name'] ?></option>
            <?php endforeach; ?>
            </select>
            <label for="basti">Select Basti</label>
        </div>
        <!-- Dropdown for Dayitva -->
        <div class="col-md-4 form-floating">
            <select class="form-select" id="dayitva" name="dayitva_id" required>
                <?php foreach ($dayitvas as $dayitva): ?>
                    <option value="<?= $dayitva['id'] ?>" <?= $dayitva['id'] == $thisDayitva['id'] ? "Selected" : "" ?> ><?= $dayitva['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="dayitva">Select Dayitva</label>
        </div>
        <!-- Karyakarta Name -->
        <div class="col-md-6 form-floating">
            <input type="text" id="name" name="name" class="form-control" value="<?= $thiskaryakarta['name'] ?>" placeholder="Enter New Karyakarta Name" required>
            <label for="name">Karyakarta Name</label>
        </div>
        <!-- Karyakarta Mobile -->
        <div class="col-md-6 form-floating">
            <input type="text" id="mobile" name="mobile" class="form-control" value="<?= $thiskaryakarta['mobile'] ?>" placeholder="Enter Mobile" minlength="10" maxlength="10" required>
            <label for="mobile">Karyakarta Mobile</label>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary btn-lg">Update</button>
        </div>
    </form>
</div>
</body>
</html>
