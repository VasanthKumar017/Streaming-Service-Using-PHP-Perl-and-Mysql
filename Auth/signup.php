<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (isset($_SESSION["username"])) {
    header("location:" . APPURL . "");
}


if (isset($_POST["submit"])) {
    if (empty($_POST["email"]) || empty($_POST["username"]) || empty($_POST["password"])) {
        echo "<script>alert('One or more fields is empty');</script>";
    } else {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $insert = $conn->prepare("INSERT INTO users (email, username, password) VALUES (:email, :username, :password)");

        $insert->execute([
            ":email" => $email,
            ":username" => $username,
            ":password" => $password,
        ]);

        header("Location: login.php");
        exit(); // Ensure the script stops executing after the redirect
    }
}
?>

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="../img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Sign Up</h2>
                    <p>Welcome to the official Anime blog.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Signup Section Begin -->
<section class="signup spad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login__form">
                    <h3>Sign Up</h3>
                    <form action="signup.php" method="POST">
                        <div class="input__item ">
                            <input class="col-md-12" name="email" type="text" placeholder="Email address">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input name="username" type="text" placeholder="Your Name">
                            <span class="icon_profile"></span>
                        </div>
                        <div class="input__item">
                            <input name="password" type="password" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <button name="submit" type="submit" class="site-btn">Register</button>
                    </form>
                    <h5>Already have an account? <a href="login.php">Log In!</a></h5>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Signup Section End -->

<!-- Footer Section Begin -->
<?php require "../includes/footer.php"; ?>