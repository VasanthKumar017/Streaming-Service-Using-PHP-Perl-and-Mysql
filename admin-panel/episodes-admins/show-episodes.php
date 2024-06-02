<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>

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

              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>vid.mp4</td>
              <td>thumbnail.jpg</td>
              <td>ep 1</td>

              <td><a href="delete-episodes.html" class="btn btn-danger  text-center ">delete</a></td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>vid.mp4</td>
              <td>thumbnail.jpg</td>
              <td>ep 1</td>

              <td><a href="delete-episodes.html" class="btn btn-danger  text-center ">delete</a></td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>vid.mp4</td>
              <td>thumbnail.jpg</td>
              <td>ep 1</td>

              <td><a href="delete-episodes.html" class="btn btn-danger  text-center ">delete</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php require "../layouts/footer.php" ?>>