<?php
require_once __DIR__ . "/../db.php";

$check_array = array('nickname', 'password', 'submit');

if (!array_diff($check_array, array_keys($_POST)) and $_POST["submit"] == "Log In") {
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];

    $user = R::findOne('users', 'nickname = ?', array($nickname));

    if ($user) {
        $password_valid = password_verify($password, $user["password"]);

        if ($password_valid) {
            $_SESSION["user"] = array("id" => $user["id"], "nickname" => $user["nickname"]);
            echo '<script>toastr.success("Successful")</script>';
        } else {
            echo '<script>toastr.warning("Password is wrong")</script>';
        }
    } else {
        echo '<script>toastr.error("User does not exist")</script>';
    }

    echo '<script>window.history.replaceState( null, null, window.location.href)</script>';
}
?>
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formLogin" action="" method="post">
                    <div class="mb-3 row">
                        <label for="nicknameLogin" class="col-sm-2 col-form-label">Nickname</label>
                        <div class="col-sm-10">
                            <input type="text" name="nickname" class="form-control" id="nicknameLogin" required minlength="4">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="passwordLogin" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="passwordLogin" required minlength="4">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="submit" class="btn btn-primary" form="formLogin" value="Log In">
            </div>
        </div>
    </div>
</div>