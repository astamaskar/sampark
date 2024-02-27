<?= view('common/head') ?>
<div class="container mx-10">
    <form action=<?= base_url("nagar"); ?> method="post" class="row g-2">
        <div class="col-auto form-floating">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter new nagar name">
            <label for="name">Nagar Name</label>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-lg mb-3">Create</button>
        </div>
    </form>
</div>
</body>
</html>
