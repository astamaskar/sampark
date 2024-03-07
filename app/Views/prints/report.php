<?= view('common/head'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h4>कुल अपेक्षित : <?= $kulApekshit; ?></h4>
            <h4>कुल उपस्थित : <?= $kulUpasthit; ?></h4>
        </div>
        <div class="col-md-4">
            <h4>अपेक्षित नगर : <?= $nagarsCount; ?></h4>
            <h4>उपस्थित नगर : <?= $nagarsDistinct; ?></h4>
        </div>
        <div class="col-md-4">
            <h4>अपेक्षित बस्तियाँ : <?= $bastisCount; ?></h4>
            <h4>उपस्थित बस्तियाँ : <?= $bastisDistinct; ?></h4>
        </div>
    </div>
    <hr>
    <div class="row mt-4">
                <div class="col-md-6 ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>क्र.</th>
                                <th>नगर</th>
                                <th>अपेक्षित</th>
                                <th>उपस्थित</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            <?php foreach ($nagarsData as $nagar): ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td><?= $nagar['name'] ?></td>
                                <td><?= $nagar['nagarApekshit'] ?></td>
                                <td><?= $nagar['nagarUpasthit'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

    <?php $sr = 0; ?>

    <?php foreach ($nagarsData as $nagar): ?>
        <hr>
        <div class="row mt-4">
            <div class="col-md-4 ">
                    <h3><?= ++$sr."."." ".$nagar['name']; ?></h3>
                </div>
                <div class="col-md-1">
                    <div class="text-center">
                        <h5>अपेक्षित<br><?= $nagar['nagarApekshit']; ?></h5>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="text-center">
                        <h5>उपस्थित<br><?= $nagar['nagarUpasthit']; ?></h5>
                    </div>
                </div>
            </div>
            <hr>



            <div class="row mt-4">
                <div class="col-md-6 ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>क्र.</th>
                                <th>बस्ती </th>
                                <th>अपेक्षित</th>
                                <th>उपस्थित</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count1 = 0; ?>
                            <?php foreach ($nagar['bastiData'] as $basti): ?>
                            <tr>

                                <td><?= ++$count1; ?></td></div>
                                <td><?= $basti['bastiName'] ?></td>
                                <td><?= $basti['bastiApekshit'] ?></td>
                                <td><?= $basti['bastiUpasthit'] ?></td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

    <?php endforeach; ?>
<hr>
    <div class="row mt-4">
                <div class="col-md-6 ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>क्र.</th>
                                <th>दायित्व</th>
                                <th>अपेक्षित</th>
                                <th>उपस्थित</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count2 = 0; ?>
                            <?php foreach ($dayitvaData as $dayitva): ?>
                            <tr>
                                <td><?= ++$count2; ?></td>
                                <td><?= $dayitva['name'] ?></td>
                                <td><?= $dayitva['apekshit'] ?></td>
                                <td><?= $dayitva['upasthit'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
</body>
</html>
