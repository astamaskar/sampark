<?= view('common/head') ?>
<div class="container mx-10">
    <form action="<?= site_url('contact/create') ?>" class="row g-2" method="post">
        <!-- Dropdown for Nagars -->
        <div class="col-md-4 form-floating">
            <select id="nagar" name="nagar_id" class="form-select" hx-get="/sampark/public/getbastis" hx-target="#basti" hx-swap="innerHTML" required>
                <?php foreach ($nagars as $nagar): ?>
                    <option value="<?= $nagar['id'] ?>"><?= $nagar['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="nagar">Select Nagar:</label>
        </div>
        <!-- Dropdown for Bastis -->
        <div class="col-md-4 form-floating">
            <select class="form-select" id="basti" name="basti_id" hx-get="/sampark/public/getmohallas" hx-target="#mohalla" hx-swap="innerHTML" required>
                <?php foreach ($bastis as $basti): ?>
                    <option value="<?= $basti['id'] ?>"><?= $basti['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="basti">Select Basti:</label>
        </div>
        <!-- Dropdown for Mohallas -->
        <div class="col-md-4 form-floating pb-3">
            <select class="form-select" id="mohalla" name="mohalla_id" required>
                <?php foreach ($mohallas as $mohalla): ?>
                    <option value="<?= $mohalla['id'] ?>"><?= $mohalla['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="mohalla">Select Mohalla:</label>
        </div><hr>
        <!-- Name Input -->
        <div class="col-md-4 form-floating">
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required>
            <label for="name">Name</label>
        </div>
        <!-- Mobile Input -->
        <div class="col-md-4 form-floating">
            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter Mobile No." required>
            <label for="mobile">Mobile</label>
        </div>
        <!-- Email Input -->
        <div class="col-md-4 form-floating">
            <input type="text" id="email" name="email" class="form-control" placeholder="Enter email address" >
            <label for="email">email</label>
        </div>
        <!-- House No Input -->
        <div class="col-md-2 form-floating">
            <input type="text" id="house_no" name="house_no" class="form-control" placeholder="House No." >
            <label for="house_no">House No.</label>
        </div>
        <!-- Colony Input -->
        <div class="col-md-3 form-floating">
            <input type="text" id="colony" name="colony" class="form-control" placeholder="Name of Colony" >
            <label for="colony">Name of Colony</label>
        </div>
        <!-- Street Input -->
        <div class="col-md-4 form-floating">
            <input type="text" id="street" name="street" class="form-control" placeholder="Name of Street" >
            <label for="street">Name of Street</label>
        </div>
        <!-- Area Input -->
        <div class="col-md-3 form-floating">
            <input type="text" id="area" name="area" class="form-control" placeholder="Name of Area" >
            <label for="area">Name of Area</label>
        </div>
        <!-- Pin Input -->
        <div class="col-md-4 form-floating">
            <input type="text" id="pin" name="pincode" class="form-control" placeholder="PinCode" value="492001" required >
            <label for="pin">PinCode</label>
        </div>
        <!-- City Input -->
        <div class="col-md-4 form-floating">
            <input type="text" id="city" name="city" class="form-control" value="Raipur" placeholder="City" >
            <label for="city">City</label>
        </div>
        <!-- State Input -->
        <div class="col-md-4 form-floating">
            <input type="text" id="state" name="state" class="form-control" value="Chhattisgarh" placeholder="State" >
            <label for="state">State</label>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-lg mt-3" type="submit">Create</button>
        </div>
    </form>
</div>
</body>

</html>
