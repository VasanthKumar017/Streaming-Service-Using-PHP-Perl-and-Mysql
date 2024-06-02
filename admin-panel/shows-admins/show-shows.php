<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

if (!isset($_SESSION["adminname"])) {
  header("location:" . ADMINURL . "admins/login-admins.php");
}

$shows = $conn->query("SELECT * FROM shows");
$shows->execute();

$allShows = $shows->fetchAll(PDO::FETCH_OBJ);

?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Shows</h5>
        <a href="<?php echo ADMINURL; ?>shows-admins/create-shows.php" class="btn btn-primary mb-4 text-center float-right">Create Shows</a>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">title</th>
              <th scope="col">image</th>
              <th scope="col">type</th>
              <th scope="col">date_aired</th>
              <th scope="col">status</th>
              <th scope="col">genre</th>
              <th scope="col">num_available</th>
              <th scope="col">num_total</th>
              <th scope="col">created_at</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allShows as $shows) : ?>
              <tr>
                <th scope="row"><?php echo $shows->id; ?></th>
                <td><?php echo $shows->title; ?></td>
                <td><?php echo $shows->image; ?></td>
                <td><?php echo $shows->type; ?></td>
                <td><?php echo $shows->date_aired; ?></td>
                <td><?php echo $shows->status; ?></td>
                <td><?php echo $shows->genre ?></td>
                <!-- <td>11</td>
              <td>15</td> -->
                <td><?php echo $shows->created_at ?></td>
                <td><a href="<?php echo ADMINURL; ?>shows-admins/delete-shows.php" class="btn btn-danger  text-center ">delete</a></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php require "../layouts/footer.php" ?>>