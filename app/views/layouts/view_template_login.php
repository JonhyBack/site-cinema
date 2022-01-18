<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formLogin">
                    <div class="mb-3 row">
                        <label for="nicknameLogin" class="col-sm-2 col-form-label">Nickname</label>
                        <div class="col-sm-10">
                            <input type="text" name="nickname" class="form-control" id="nicknameLogin" required
                                   minlength="4">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="passwordLogin" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="passwordLogin" required
                                   minlength="4">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" form="formLogin">
            </div>
        </div>
    </div>
</div>

<script>
    $('#formLogin').submit((e) => {
        e.preventDefault();
        const data = $('#formLogin').serializeArray();

        $.post({
            url: '<?php echo '//' . $_SERVER['HTTP_HOST'] . '/auth/login' ?>',
            data: data,
            dataType: "json"
        }).always(() => {
            window.location.reload();
        });
    });
</script>