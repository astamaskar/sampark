<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">संपर्क</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $page_title=="New Karyakarta" ? "active" : ""?>" href="<?= site_url('karyakarta/new') ?>">नया कार्यकर्ता</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= $page_title=="Karyakarta" ? "active" : ""?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            कार्यकर्ता सूची
          </a>

          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?= site_url('karyakartas/list') ?>">सभी</a></li>
            <li><a class="dropdown-item" href="<?= site_url('karyakartas/bynagar') ?>">नगरशः </a></li>
            <li><a class="dropdown-item" href="<?= site_url('karyakartas/bybasti') ?>">बस्तीशः </a></li>
            <li><a class="dropdown-item" href="<?= site_url('karyakartas/bydayitva') ?>">दायित्वानुसार</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?=  ($page_title!="Karyakarta")&&
                                                  ($page_title!="New Karyakarta")&&
                                                  ($page_title!="Print Karyakarta QR Code")&&
                                                  ($page_title!="Report")&&
                                                  ($page_title!="Nagars")&&($page_title!="Bastis")&&($page_title!="Dayitva") ? "active" : ""?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            उपस्थिति
          </a>

          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?= site_url('attendees/list') ?>">सभी</a></li>
            <li><a class="dropdown-item" href="<?= site_url('attendees/bynagar') ?>">नगरशः</a></li>
            <li><a class="dropdown-item" href="<?= site_url('attendees/bybasti') ?>">बस्तीशः</a></li>
            <li><a class="dropdown-item" href="<?= site_url('attendees/bydayitva') ?>">दायित्वानुसार</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page_title=="Report" ? "active" : ""?>" href="<?= site_url('attendees/report') ?>">वृत्त</a>
          </li>
        </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= ($page_title=="Nagars")||($page_title=="Bastis")||($page_title=="Dayitva")||($page_title=="Print Karyakarta QR Code") ? "active" : ""?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            नियोजन
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= site_url('nagar') ?>">नगर</a></li>
            <li><a class="dropdown-item" href="<?= site_url('basti') ?>">बस्ती</a></li>
            <!-- <li><a class="dropdown-item" href="</?= site_url('mohalla') ?>">Mohalla</a></li> -->
            <li><a class="dropdown-item" href="<?= site_url('dayitva') ?>">दायित्व</a></li>
            <hr>
            <li><a class="dropdown-item pb-2" href="<?= site_url('qr/printbybasti') ?>">Print QR</a></li>
          </ul>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="<?= site_url('logout') ?>">निकास</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
