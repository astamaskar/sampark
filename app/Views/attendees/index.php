<?= view('common/head') ?>
<div class="container mx-10">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Nagar Name</th>
                <th>Basti Name</th>
                <th>Dayitva Name</th>
                <th>Karyakarta Name</th>
                <th>Mobile</th>

            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
            <?php foreach ($karyakartax as $karyakarta): ?>
            <tr>
                <td><?= ++$count; ?></td>
                <td><?= $karyakarta['nagar_name'] ?></td>
                <td><?= $karyakarta['basti_name'] ?></td>
                <td><?= $karyakarta['dayitva'] ?></td>
                <td><?= $karyakarta['name'] ?></td>
                <td><?= $karyakarta['mobile'] ?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
</body>
</html>
