<?php
    include 'css-link.php';
    include 'footer.php';
?>

<section class="vh-100" style="background-color: #eee;">
    <?php
    session_start();

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    }
    unset($_SESSION['msg']);
    ?>
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-8">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                                <form method="post" action="login-page.php">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="username" name="user_name" class="form-control"
                                            placeholder="Username" required />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Password" required />
                                    </div>

                                    <!-- Submit button -->
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" value="Login" name="submit"
                                            class="btn btn-block mb-4 login-btn">Login</button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="./assets/login.jpg" class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>