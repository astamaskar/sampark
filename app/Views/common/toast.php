
<!-- Toast Element -->
<div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="50000">
    <div class="toast-header">
        <strong class="mr-auto">Notification</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        <?= $message ?>
    </div>
</div>
