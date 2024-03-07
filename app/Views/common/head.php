<?= view('common/header') ?>
<body>
    <?= view('common/navbar') ?>
    <?= view('common/notice') ?>
    <h2 class="px-4 pt-3"><?= $page_heading ?? $page_title ?></h2>
    <hr>
    <!-- Placeholder for Toast -->
    <!-- <div id="toastPlaceholder" hx-get="/sampark/public/getToast" hx-trigger="load" hx-target="#toastPlaceholder" hx-swap="outerHTML">Hello</div> -->
