<!-- Modal -->
<div class="modal fade" id="createNagarModal" tabindex="-1" role="dialog" aria-labelledby="createNagarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createNagarModalLabel">Create New Nagar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for Creating New Nagar -->
                <h1>Create Nagar</h1>
                <form action=<?= base_url("nagar"); ?> method="post">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name">
                    <button type="submit">Create</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
