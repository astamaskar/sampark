<?= view('common/header'); ?>
<div class="container">
<div class="row align-items-center">

<?php foreach ($bastis as $karyakartas): ?>
    <?php foreach ($karyakartas as $karyakarta): ?>
        <div class="col-md-2 align-self-center pt-2 pb-2">
            <!-- <div class="d-flex justify-content-center"> -->
            <div class="col text-center" style="font-size: .8rem;"><?= $karyakarta['nagar']; ?></div>
            <div class="col text-center" style="font-size: .8rem; margin-top: -.5rem;"><?= $karyakarta['basti']; ?></div>
            <div class="col text-center"><?php echo $karyakarta['code']; ?></div>
            <div class="col text-center"  style="font-size: .9rem;"><?= $karyakarta['name']; ?></div>
            <div class="col text-center" style="font-size: .9rem; margin-top: -.5rem;"><?= $karyakarta['mobile']; ?></div>


            <!-- </div> -->
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>
</div>
</div>
</body>
</html>
