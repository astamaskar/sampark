<?= view('common/head') ?>
<div class="container mx-10">
    <form action=<?= base_url("nagar/update/".$nagar['id']) ?> method="post" class="row g-2">
        <div class="col-auto form-floating">
            <input type="text" name="name" id="name" value="<?= $nagar['name'] ?>" class="form-control" placeholder="Enter nagar name">
            <label for="name">Nagar Name</label>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-lg mb-3">Update</button>
        </div>
    </form>
</div>
</body>
</html>
