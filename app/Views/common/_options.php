<option value="">--Select--</option>
<?php foreach ($options as $option): ?>
    <option value="<?= $option['id'] ?>"><?= $option['name'] ?></option>
<?php endforeach; ?>
