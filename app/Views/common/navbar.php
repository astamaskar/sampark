<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sampark</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $page_title=="Contacts" ? "active" : ""?>" href="<?= site_url('contact') ?>">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page_title=="New Contact" ? "active" : ""?>" href="<?= site_url('contact/new') ?>">New Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= ($page_title!="Contacts")&&($page_title!="New Contact") ? "active" : ""?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Configuration
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= site_url('nagar') ?>">Nagar</a></li>
            <li><a class="dropdown-item" href="<?= site_url('basti') ?>">Basti</a></li>
            <li><a class="dropdown-item" href="<?= site_url('mohalla') ?>">Mohalla</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link " href="<?= site_url('logout') ?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
