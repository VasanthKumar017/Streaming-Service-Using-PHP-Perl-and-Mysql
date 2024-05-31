<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<!-- Header End -->
<?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];




    $shows = $conn->query("SELECT shows.id AS id, shows.image AS image,shows.num_available AS num_available,
    shows.num_total AS num_total , shows.title AS title ,shows.genre AS genre ,shows.type AS type,
      COUNT(views.show_id) AS COUNT_views
      FROM shows JOIN views ON shows.id = views.show_id  WHERE shows.genre ='$name' GROUP BY(shows.id) ORDER BY views.show_id ASC");

    $shows->execute();

    $allShows = $shows->fetchAll(PDO::FETCH_OBJ);
}
?>


<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="<?php echo APPURL; ?>index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="<?php echo APPURL; ?>./categories.php?name=<?php echo $name; ?>">Categories</a>
                    <span><?php echo $name ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Section Begin -->
<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="product__page__content">
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <div class="section-title">
                                    <h4><?php echo $name ?></h4>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <?php if (count($allShows) > 0) : ?>
                            <?php foreach ($allShows as $shows) : ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="img/shows/<?php echo $shows->image ?>">
                                            <div class="ep"><?php echo $shows->num_available ?>/<?php echo $shows->num_total ?></div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i><?php echo $shows->COUNT_views ?></div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li><?php echo $shows->type ?></li>
                                                <li><?php echo $shows->genre ?></li>
                                            </ul>
                                            <h5><a href="<?php echo APPURL; ?>show-details.php?id=<?php echo $shows->id; ?>"><?php echo $shows->title ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p style="color: white;">No shows in this Genre yet</p>
                        <?php endif ?>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Footer Section Begin -->
<?php require "includes/footer.php"; ?>