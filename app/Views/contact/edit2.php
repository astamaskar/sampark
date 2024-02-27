<?= view('common/head') ?>
<div class="container mx-10">
    <form action=<?= site_url('mohalla/update/'.$thisMohalla['id']) ?> class="row g-2" method="post">
        <div class="col-auto form-floating">
            <input type="text" id="name" name="name" class="form-control" value="<?= $thisMohalla['name'] ?>" placeholder="Enter New Mohalla Name" required>
            <label for="name">Mohalla Name</label>
        </div>

        <!-- Dropdown for Nagars -->
        <div class="col-auto form-floating">
            <select id="nagar" name="nagar_id" class="form-select" hx-get="/sampark/public/getbastis" hx-target="#basti" hx-swap="innerHTML" required>
            <?php foreach ($nagars as $nagar): ?>
                    <option value="<?= $nagar['id'] ?>" <?= $nagar['id'] == $thisNagar['id'] ? "Selected" : "" ?>><?= $nagar['name'] ?></option>
            <?php endforeach; ?>
            </select>
            <label for="nagar">Select Nagar:</label>
        </div>
        <!-- Dropdown for Bastis -->
        <div class="col-auto form-floating">
            <select id="basti" name="basti_id" class="form-select" required>
            <?php foreach ($bastis as $basti): ?>
                <option value="<?= $basti['id'] ?>"<?= $basti['id'] == $thisBasti['id'] ? "Selected" : "" ?> ><?= $basti['name'] ?></option>
            <?php endforeach; ?>
            </select>
            <label for="basti">Select Basti:</label>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-lg">Update</button>
        </div>
    </form>
</div>
</body>
</html>
