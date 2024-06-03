<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

if (!isset($_SESSION["adminname"])) {
  header("location:" . ADMINURL . "admins/login-admins.php");
}

$genre = $conn->query("SELECT * FROM genres");
$genre->execute();

$allGenre = $genre->fetchAll(PDO::FETCH_OBJ);

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Genres</h5>
        <a href="<?php echo ADMINURL; ?>genres-admins/create-genres.php" class="btn btn-primary mb-4 text-center float-right">Create Genres</a>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>

              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allGenre as $genre) : ?>
              <tr>
                <th scope="row"><?php echo $genre->id ?></th>
                <td><?php echo $genre->name ?></td>

                <td><a href="delete-genres.php?name=<?php echo $genre->name ?>" class="btn btn-danger  text-center ">delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php require "../layouts/footer.php" ?>>