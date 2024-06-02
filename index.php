<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php

$shows = $conn->query("SELECT * FROM shows LIMIT 3");
$shows->execute();

$allShows = $shows->fetchAll(PDO::FETCH_OBJ);

//trending shows
$trendingShows = $conn->query("SELECT shows.id AS id, shows.image AS image,shows.num_available AS num_available,
shows.num_total AS num_total , shows.title AS title ,shows.genre AS genre ,shows.type AS type,
  COUNT(views.show_id) AS COUNT_views
  FROM shows JOIN views ON shows.id = views.show_id GROUP BY(shows.id) ORDER BY COUNt_views DESC");

$trendingShows->execute();

$allTrendingShows = $trendingShows->fetchAll(PDO::FETCH_OBJ);


//adventure shows
$adventureShows = $conn->query("SELECT shows.id AS id, shows.image AS image,shows.num_available AS num_available,
shows.num_total AS num_total , shows.title AS title ,shows.genre AS genre ,shows.type AS type,
  COUNT(views.show_id) AS COUNT_views
  FROM shows JOIN views ON shows.id = views.show_id  WHERE shows.genre ='adventure' GROUP BY(shows.id) ORDER BY views.show_id ASC");

$adventureShows->execute();
$allAdventureShows = $adventureShows->fetchAll(PDO::FETCH_OBJ);

//action shows
$actionShows = $conn->query("SELECT shows.id AS id, shows.image AS image,shows.num_available AS num_available,
shows.num_total AS num_total , shows.title AS title ,shows.genre AS genre ,shows.type AS type,
  COUNT(views.show_id) AS COUNT_views
  FROM shows JOIN views ON shows.id = views.show_id  WHERE shows.genre ='action' GROUP BY(shows.id) ORDER BY views.show_id ASC");

$actionShows->execute();
$allActionShows = $actionShows->fetchAll(PDO::FETCH_OBJ);

//Recently Added Shows
$recentlyAddedShows = $conn->query("SELECT shows.id AS id, shows.image AS image,shows.num_available AS num_available,
shows.num_total AS num_total , shows.title AS title ,shows.genre AS genre ,shows.type AS type,
  COUNT(views.show_id) AS COUNT_views
  FROM shows JOIN views ON shows.id = views.show_id   GROUP BY(shows.id) ORDER BY shows.created_at DeSC");

$recentlyAddedShows->execute();
$allRecentlyAddedShows = $recentlyAddedShows->fetchAll(PDO::FETCH_OBJ);

//for you shows 
$forYouShows = $conn->query("SELECT shows.id AS id, shows.image AS image,shows.num_available AS num_available,
shows.num_total AS num_total , shows.title AS title ,shows.genre AS genre ,shows.type AS type,
  COUNT(views.show_id) AS COUNT_views
  FROM shows JOIN views ON shows.id = views.show_id  GROUP BY(shows.id) ORDER BY views.show_id ASC");

$forYouShows->execute();
$allForYouShows = $forYouShows->fetchAll(PDO::FETCH_OBJ);


?>


<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            <?php foreach ($allShows as $show) : ?>
                <div class="hero__items set-bg" data-setbg="img/shows/<?php echo $show->image; ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label"><?php echo $show->genre; ?></div>
                                <h2><?php echo $show->title; ?></h2>
                                <p><?php echo $show->description; ?></p>
                                <a href="<?php echo APPURL; ?>show-watching.php?id=<?php echo $show->id; ?>&ep=1"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <!-- //Trending Section -->
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Trending Now</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($allTrendingShows as $trendingShows) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/shows/<?php echo $trendingShows->image; ?>">
                                        <div class="ep"><?php echo $trendingShows->num_available; ?>/ <?php echo $trendingShows->num_total; ?></div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> <?php echo $trendingShows->COUNT_views; ?></div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><?php echo $trendingShows->type; ?></li>
                                            <li><?php echo $trendingShows->genre; ?></li>
                                        </ul>
                                        <h5><a href="<?php echo APPURL; ?>show-details.php?id=<?php echo $trendingShows->id; ?>"><?php echo $trendingShows->title; ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


                <!-- //Adventure Section -->
                <div class="popular__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Adventure Shows</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($allAdventureShows as $adventureShows) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/shows/<?php echo $adventureShows->image; ?>">
                                        <div class="ep"><?php echo $adventureShows->num_available; ?> / <?php echo $adventureShows->num_total; ?></div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> <?php echo $adventureShows->COUNT_views; ?></div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><?php echo $adventureShows->type; ?></li>
                                            <li><?php echo $adventureShows->genre; ?></li>
                                        </ul>
                                        <h5><a href="<?php echo APPURL; ?>show-details.php?id=<?php echo $adventureShows->id; ?>"><?php echo $adventureShows->title; ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>




                <!-- //Recently Added -->
                <div class="recent__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Recently Added Shows</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($allRecentlyAddedShows as $recentlyAddedShows) : ?>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/shows/<?php echo $recentlyAddedShows->image; ?>">
                                        <div class="ep"><?php echo $recentlyAddedShows->num_available; ?>/ <?php echo $recentlyAddedShows->num_total; ?></div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i><?php echo $recentlyAddedShows->COUNT_views; ?></div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><?php echo $recentlyAddedShows->type; ?></li>
                                            <li><?php echo $recentlyAddedShows->genre; ?></li>
                                        </ul>
                                        <h5><a href="<?php echo APPURL; ?>show-details.php?id=<?php echo $recentlyAddedShows->id; ?>"><?php echo $recentlyAddedShows->title; ?></a></h5>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>
                        <!-- <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/recent/recent-2.jpg">
                                    <div class="ep">18 / 18</div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li>Active</li>
                                        <li>Movie</li>
                                    </ul>
                                    <h5><a href="#">Fate/stay night Movie: Heaven's Feel - II. Lost</a></h5>
                                </div>
                            </div>
                        </div> -->




                    </div>
                </div>


                <!-- Live Product -->

                <div class="live__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Live Action</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($allActionShows as $actionShows) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/shows/<?php echo $actionShows->image ?>">
                                        <div class="ep"><?php echo $actionShows->num_available ?>/<?php echo $actionShows->num_total ?></div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i><?php echo $actionShows->COUNT_views ?></div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><?php echo $actionShows->type ?></li>
                                            <li><?php echo $actionShows->genre ?></li>
                                        </ul>
                                        <h5><a href="<?php echo APPURL; ?>show-details.php?id=<?php echo $actionShows->id ?>"><?php echo $actionShows->title ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>
            <!-- For You -->
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                    </div>
                </div>
                <div class="product__sidebar__comment">
                    <div class="section-title">
                        <h5>For You</h5>
                    </div>
                    <?php foreach ($allForYouShows as $forYouShows) : ?>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img style="width: 150px;height:200px;" src="img/shows/<?php echo $forYouShows->image ?>" alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li><?php echo $forYouShows->type ?></li>
                                    <li><?php echo $forYouShows->genre ?></li>
                                </ul>
                                <h5><a href="<?php echo APPURL; ?>show-details.php?id=<?php echo $forYouShows->id ?>"><?php echo $forYouShows->title ?></a></h5>
                                <span><i class="fa fa-eye"></i><?php echo $forYouShows->COUNT_views ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
<!-- Product Section End -->

<?php require "includes/footer.php"; ?>