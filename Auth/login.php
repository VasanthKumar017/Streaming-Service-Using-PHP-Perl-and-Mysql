<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php



if (isset($_SESSION["username"])) {
    header("location:" . APPURL . "");
}

if (isset($_POST["submit"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo "<script>alert('One or more fields is empty');</script>";
    } else {

        //get the data and the query that checks the email

        $email = $_POST['email'];
        $password = $_POST['password'];

        $login = $conn->query("SELECT * FROM users WHERE email='$email'");
        $login->execute();

        //fetch the data
        $fetch = $login->fetch(PDO::FETCH_ASSOC);


        //use the rowcount 
        if ($login->rowcount() > 0) {

            //check for the password
            if (password_verify($password, $fetch["password"])) {

                $_SESSION['username'] = $fetch['username'];
                $_SESSION['email'] = $fetch['email'];
                $_SESSION['user_id'] = $fetch['id'];
                header("location:" . APPURL . "");

                //start session
                echo "<script>alert('logged In')</script>";
                // header("Location:" . APPURL . "");
            } else {
                echo "<script>alert('email or password is incorrect')</script>";
            }
        } else {

            echo "<script>alert('email or password is incorrect')</script>";
        }
    }
}



?>



<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="../img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Login</h2>
                    <p>Welcome to the official Tokyo Streams.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Login Section Begin -->
<section class="login spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Login</h3>
                    <form action="login.php" method="POST">
                        <div class="input__item">
                            <input name="email" type="text" placeholder="Email address">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input name="password" type="password" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <button name="submit" type="submit" class="site-btn">Login Now</button>
                    </form>
                    <a href="#" class="forget_pass">Forgot Your Password?</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__register">
                    <h3>Dont’t Have An Account?</h3>
                    <a href="signup.php" class="primary-btn">Register Now</a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Login Section End -->

<!-- Footer Section Begin -->
<?php require "../includes/footer.php"; ?>