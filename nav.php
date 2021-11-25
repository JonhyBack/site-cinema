<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 ms-5">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/about">About</a>
                </li>
            </ul>

            <div class="text-end">

                <?php
                    if (isset($_SESSION["user"])) {
                        echo '<span style="font-size: 110%;color: lavender">Hello, ' . $_SESSION["user"]["nickname"] . '!</span>
                                <a type="button" href="/auth/logout.php" class="btn btn-warning">Logout</a>';
                    } else {
                        echo '<button id="loginBtn" type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                                <button id="signupBtn" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#signupModal">Sign-up</button>';
                    }
                ?>

            </div>

        </div>
    </div>
</nav>

