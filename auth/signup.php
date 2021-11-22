<?php
require_once __DIR__ . "/../db.php";

$check_array = array('nickname', 'password', 'submit');

if (!array_diff($check_array, array_keys($_POST)) and $_POST["submit"] == "Sign Up") {
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];

    $user = R::dispense('users');
    $user["nickname"] = $_POST["nickname"];
    $user["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $userExist = R::count('users', 'nickname = ?', array($nickname)) > 0;

    if ($userExist) {
        echo '<script>toastr.warning("User exist")</script>';
    } else {
        try {
            R::store($user);
            echo '<script>toastr.success("Successful")</script>';
        } catch (\RedBeanPHP\RedException\SQL $e) {
            echo '<script>toastr.error("Something went wrong")</script>';
        }
    }

    echo '<script>window.history.replaceState( null, null, window.location.href)</script>';
}
?>

<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formSignUp" action="" method="post">
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
                <input type="submit" name="submit" class="btn btn-primary" form="formSignUp" value="Sign Up">
            </div>
        </div>
    </div>
</div>


<script src="/assets/js/signup.js"></script>