<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sampark</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $page_title=="Karyakarta" ? "active" : ""?>" href="<?= site_url('karyakarta') ?>">Karyakarta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page_title=="New Karyakarta" ? "active" : ""?>" href="<?= site_url('karyakarta/new') ?>">New Karyakarta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page_title=="Print Karyakarta QR Code" ? "active" : ""?>" href="<?= site_url('qr/printbybasti') ?>">Print QR</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?=  ($page_title!="Karyakarta")&&
                                                  ($page_title!="New Karyakarta")&&
                                                  ($page_title!="Print Karyakarta QR Code")&&
                                                  ($page_title!="Nagars")&&($page_title!="Bastis")&&($page_title!="Dayitva") ? "active" : ""?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Upasthit
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?= site_url('attendees/list') ?>">All</a></li>
            <li><a class="dropdown-item" href="<?= site_url('attendees/bynagar') ?>">By Nagar</a></li>
            <li><a class="dropdown-item" href="<?= site_url('attendees/bybasti') ?>">By Basti</a></li>
            <li><a class="dropdown-item" href="<?= site_url('attendees/bydayitva') ?>">By Dayitva</a></li>
          </ul>
        </li>
        </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= ($page_title=="Nagars")||($page_title=="Bastis")||($page_title=="Dayitva") ? "active" : ""?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Configuration
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= site_url('nagar') ?>">Nagar</a></li>
            <li><a class="dropdown-item" href="<?= site_url('basti') ?>">Basti</a></li>
            <!-- <li><a class="dropdown-item" href="</?= site_url('mohalla') ?>">Mohalla</a></li> -->
            <li><a class="dropdown-item" href="<?= site_url('dayitva') ?>">Dayitva</a></li>
          </ul>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="<?= site_url('logout') ?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
