<?= view('common/header'); ?>
</?= print_r($nagarsData) ?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Kul Apekshit : <?= $kulApekshit; ?></h3>
            <h3>Kul Upasthit : <?= $kulUpasthit; ?></h3>
        </div>
        <div class="col-md-4">
            <h3>Apekshit Nagar : <?= $nagarsCount; ?></h3>
            <h3>Upasthit Nagar : <?= $nagarsDistinct; ?></h3>
        </div>
        <div class="col-md-4">
            <h3>Apekshit Basti : <?= $bastisCount; ?></h3>
            <h3>Upasthit Basti : <?= $bastisDistinct; ?></h3>
        </div>
    </div>
    <hr>
    <?php foreach ($nagarsData as $nagar): ?>
        <div class="row mt-4">
        <div class="col-md-3 ">
                <h3><?= $nagar['name']; ?></h3>
            </div>
            <div class="col-md-1">
                <div class="text-center">
                    <h5>Apekshit <?= $nagar['nagarApekshit']; ?></h5>
                </div>
            </div>
            <div class="col-md-1">
                <div class="text-center">
                    <h5>Upasthit <?= $nagar['nagarUpasthit']; ?></h5>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-4">
            <div class="col-md-5 ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Basti Name</th>
                            <th>Upasthit</th>
                            <th>Apekshit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; ?>
                        <?php foreach ($nagar['bastiData'] as $basti): ?>
                        <tr>
                            <td><?= ++$count; ?></td>
                            <td><?= $basti['bastiName'] ?></td>
                            <td><?= $basti['bastiUpasthit'] ?></td>
                            <td><?= $basti['bastiApekshit'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>