<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

if (!isset($_SESSION["adminname"])) {
  header("location:" . ADMINURL . "admins/login-admins.php");
}



if (isset($_POST["submit"])) {
  if (empty($_POST["email"]) || empty($_POST["adminname"]) || empty($_POST["password"])) {
    echo "<script>alert('One or more fields is empty');</script>";
  } else {
    $email = $_POST['email'];
    $adminname = $_POST['adminname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $insert = $conn->prepare("INSERT INTO admins (email, adminname, password) VALUES (:email, :adminname, :password)");

    $insert->execute([
      ":email" => $email,
      ":adminname" => $adminname,
      ":password" => $password,
    ]);

    //echo "<script>alert(Added '$adminname' as an Admin )</script>";
    header("Location:admins.php");
    // exit(); // Ensure the script stops executing after the redirect
  }
}





?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Admins</h5>
        <form method="POST" action="create-admins.php" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />

          </div>

          <div class="form-outline mb-4">
            <input type="text" name="adminname" id="form2Example1" class="form-control" placeholder="adminname" />
          </div>
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
          </div>







          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


        </form>

      </div>
    </div>
  </div>
  <?php require "../layouts/footer.php" ?>>