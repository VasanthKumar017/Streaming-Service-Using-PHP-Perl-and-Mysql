<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php


if (!isset($_SESSION["adminname"])) {
  header("location:" . ADMINURL . "admins/login-admins.php");
}

$episodes = $conn->query("SELECT * FROM episodes");
$episodes->execute();

$allEpisodes = $episodes->fetchAll(PDO::FETCH_OBJ);



?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Episodes</h5>
        <a href="<?php echo ADMINURL; ?>episodes-admins/create-episodes.php" class="btn btn-primary mb-4 text-center float-right">Create Episodes</a>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">video</th>
              <th scope="col">thumbnail</th>
              <th scope="col">name</th>
              <th scope="col">show_id</th>

              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allEpisodes as $episodes) : ?>
              <tr>
                <th scope="row"><?php echo $episodes->id ?></th>
                <td><?php echo $episodes->video ?></td>
                <td><img style="width:70px;height:70px;" src="videos/<?php echo $episodes->thumbnail ?>"></td>
                <td>ep <?php echo $episodes->name ?></td>
                <td><?php echo $episodes->show_id ?></td>
                <td><a href="delete-episodes.php?id=<?php echo $episodes->id ?>" class="btn btn-danger  text-center ">delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php require "../layouts/footer.php" ?>>