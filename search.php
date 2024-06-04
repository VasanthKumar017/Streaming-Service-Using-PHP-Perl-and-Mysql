<!-- header -->
<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>

<?php

if (isset($_POST['submit'])) {
    if (empty($_POST['keyword'])) {
        echo "<script>location.href='" . APPURL . "'</script>";
    } else {

        $keyword = $_POST['keyword'];
        $search = $conn->query("SELECT * FROM shows WHERE title LIKE '%$keyword%' OR genre LIKE '%$keyword%';");
        $search->execute();

        $allSearches = $search->fetchAll(PDO::FETCH_OBJ);
    }
}




?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="<?php echo APPURL; ?>index.php"><i class="fa fa-home"></i> Home</a>

                    <span>Search</span>
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
                                    <h4>Search</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <?php if (count($allSearches) > 0) : ?>
                            <?php foreach ($allSearches as $shows) : ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="<?php echo IMGURL; ?><?php echo $shows->image ?>">
                                            <div class="ep"><?php echo $shows->num_available ?>/<?php echo $shows->num_total ?></div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
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
                            <p style="color: white;">No shows </p>
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



<!-- footer -->
<?php require "includes/footer.php"; ?>