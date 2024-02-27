<!-- login_view.php -->
<?= view('common/header', ['page_title' => 'Login'] ) ?>
<?= view('common/notice') ?>

<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h1 class="mb-5">Sampark</h1>
            <h3 class="mb-5">Sign in</h3>
                <form method="post" action="<?= site_url('login/authenticate') ?>">
                    <div class="form-outline form-floating mb-4">
                        <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder = "Username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-outline form-floating mb-4">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder = "Password" required>
                        <label for="password">Password</label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
