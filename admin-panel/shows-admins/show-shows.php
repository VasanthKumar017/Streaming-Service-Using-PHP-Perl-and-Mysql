<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>

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
            <tr>
              <th scope="row">1</th>
              <td>Nartuo</td>
              <td>image.jpg</td>
              <td>tv series </td>
              <td>11/2/2023</td>
              <td>Airing</td>
              <td>Magic</td>
              <td>11</td>
              <td>15</td>
              <td>2023-04-09 15:13:17</td>
              <td><a href="delete-shows.html" class="btn btn-danger  text-center ">delete</a></td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>Nartuo</td>
              <td>image.jpg</td>
              <td>tv series </td>
              <td>11/2/2023</td>
              <td>Airing</td>
              <td>Magic</td>
              <td>11</td>
              <td>15</td>
              <td>2023-04-09 15:13:17</td>
              <td><a href="delete-shows.html" class="btn btn-danger  text-center ">delete</a></td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>Nartuo</td>
              <td>image.jpg</td>
              <td>tv series </td>
              <td>11/2/2023</td>
              <td>Airing</td>
              <td>Magic</td>
              <td>11</td>
              <td>15</td>
              <td>2023-04-09 15:13:17</td>
              <td><a href="delete-shows.html" class="btn btn-danger  text-center ">delete</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php require "../layouts/footer.php" ?>>