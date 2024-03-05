<?= view('common/header'); ?>
<div class="container">
<div class="row align-items-center">

<?php foreach ($karyakartas as $karyakarta): ?>
            <div class="col-md-2 align-self-center pt-4 pb-4">
                <!-- <div class="d-flex justify-content-center"> -->
                <div class="col text-center"><?= $karyakarta['name']; ?></div>
                <div class="col text-center"><?php echo $karyakarta['code']; ?></div>
                <div class="col text-center"><?= $karyakarta['mobile']; ?></div>

                <!-- </div> -->
            </div>
<?php endforeach; ?>
</div>
</div>
</body>
</html>
