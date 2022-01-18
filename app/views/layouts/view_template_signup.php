<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formSignUp">
                    <div class="mb-3 row">
                        <label for="nicknameSignUp" class="col-sm-2 col-form-label">Nickname</label>
                        <div class="col-sm-10">
                            <input type="text" name="nickname" class="form-control" id="nicknameSignUp" required
                                   minlength="4">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="passwordSignUp" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="passwordSignUp" required
                                   minlength="4">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="confirmPassword"
                                   oninput="check(event.target)" required minlength="4">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" form="formSignUp">
            </div>
        </div>
    </div>
</div>

<script>
    const check = (input) => {
        if (input.value !== document.getElementById('passwordSignUp').value) {
            input.setCustomValidity('Password must be matching.');
        } else {
            input.setCustomValidity('');
        }
    }

    $('#formSignUp').submit((e) => {
        e.preventDefault();
        const data = $('#formSignUp').serializeArray();

        $.post({
            url: '<?php echo '//' . $_SERVER['HTTP_HOST'] . '/auth/signup' ?>',
            data: data,
            dataType: "json"
        }).always(() => {
            window.location.reload();
        });
    });
</script>