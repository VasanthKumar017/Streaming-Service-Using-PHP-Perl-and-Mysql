<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php



// if (isset($_SESSION["username"])) {
//     header("location:" . APPURL . "");
// }

if (isset($_POST["submit"])) {
  if (empty($_POST["email"]) || empty($_POST["password"])) {
    echo "<script>alert('One or more fields is empty');</script>";
  } else {

    //get the data and the query that checks the email

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = $conn->query("SELECT * FROM admins WHERE email='$email'");
    $login->execute();

    //fetch the data
    $fetch = $login->fetch(PDO::FETCH_ASSOC);


    //use the rowcount 
    if ($login->rowcount() > 0) {

      //check for the password
      if (password_verify($password, $fetch["password"])) {

        // $_SESSION['username'] = $fetch['username'];
        // $_SESSION['email'] = $fetch['email'];
        // $_SESSION['user_id'] = $fetch['id'];
        //echo "<script>location.href='" . APPURL . "'</script>";

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

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mt-5">Login</h5>
        <form method="POST" class="p-auto" action="login-admins.php">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

          </div>


          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />

          </div>



          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


        </form>

      </div>
    </div>
  </div>
  <?php require "../layouts/footer.php" ?>