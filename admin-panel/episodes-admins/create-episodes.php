<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Episodes</h5>
          <form method="POST" action="" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <label>name</label>
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                    <label>thumbnail</label>
                    <input type="file" name="thumbnail" id="form2Example1" class="form-control"/>
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                    <label>video</label>
                    <input type="file" name="video" id="form2Example1" class="form-control">
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                    <label>Shows</label>
                    <select name="show_id" class="form-select  form-control" aria-label="Default select example">
                      <option selected>Choose Shows</option>
                      <option value="1">The Seven Deadly Sins: Wrath of the Gods</option>
                      <option value="2">The Seven Deadly Sins: Wrath of the Gods</option>
                      <option value="3">The Seven Deadly Sins: Wrath of the Gods</option>
                    </select>
                </div>
              
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
        <?php require "../layouts/footer.php" ?>>