<?php require "includes/header.php" ?>
<?php require "config/config.php" ?>
<!-- Header End -->
<?php

if (isset($_GET["id"]) and isset($_GET["ep"])) {


    $id = $_GET["id"];
    $ep = $_GET["ep"];


    $episodes = $conn->query("SELECT * FROM episodes WHERE show_id='$id'");
    $episodes->execute();

    $allEpisodes = $episodes->fetchAll(PDO::FETCH_OBJ);

    //grabing episodes

    $episode = $conn->query("SELECT * FROM episodes WHERE show_id='$id' AND name='$ep'");
    $episode->execute();

    $singleEpisode = $episode->fetch(PDO::FETCH_OBJ);

    //show data
    $show = $conn->query("SELECT * FROM shows WHERE id='$id'");
    $show->execute();

    $singleShow = $show->fetch(PDO::FETCH_OBJ);

    //comment
    $comments = $conn->query("SELECT * FROM comments WHERE show_id='$id'");
    $comments->execute();

    $allComments = $comments->fetchALL(PDO::FETCH_OBJ);


    //inserting comments
    if (isset($_POST["inserting_comment"])) {


        if (empty($_POST["comment"])) {
            echo "<script>alert('One or more fields is empty');</script>";
        } else {
            $comment = $_POST['comment'];
            $show_id = $_POST['show_id'];
            $user_id = $_SESSION['user_id'];
            $user_name = $_SESSION['username'];



            $insert = $conn->prepare("INSERT INTO comments (comment, show_id, user_id, user_name) VALUES (:comment, :show_id, :user_id, :user_name)");

            $insert->execute([
                ":comment" => $comment,
                ":show_id" => $show_id,
                ":user_id" => $user_id,
                ":user_name" => $user_name,

            ]);

            echo "<script>alert('Comment added');</script>";
        }
    }
}




?>


<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="<?php echo APPURL; ?>"><i class="fa fa-home"></i> Home</a>
                    <a href="<?php echo APPURL; ?>categories.php?name=<?php echo $singleShow->genre; ?>">Categories</a>
                    <a href="#"><?php echo $singleShow->genre; ?></a>
                    <span>EP <?php echo $singleEpisode->name; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="anime__video__player">
                    <video id="player" playsinline controls data-poster="<?php echo APPURL; ?>shows/<?php echo $singleEpisode->thumbnail; ?>">
                        <source src="<?php echo APPURL; ?>videos/<?php echo $singleEpisode->video; ?>" type="video/mp4" />
                        <!-- Captions are optional -->
                        <!-- <track kind="captions" label="English captions" src="#" srclang="en" default /> -->
                    </video>
                </div>
                <div class="anime__details__episodes">
                    <div class="section-title">
                        <h5>List Name</h5>
                    </div>
                    <?php foreach ($allEpisodes as $episodes) : ?>
                        <a href="<?php echo APPURL; ?>show-watching.php?id=<?php echo $episodes->show_id; ?>&ep=<?php echo $episodes->id; ?>">Ep <?php echo $episodes->id; ?></a>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>comments</h5>
                    </div>
                    <?php foreach ($allComments as $comment) : ?>
                        <div class="anime__review__item">
                            <!-- <div class="anime__review__item__pic">
                            <img src="img/anime/review-1.jpg" alt="">
                        </div> -->
                            <div class="anime__review__item__text">
                                <h6><?php echo $comment->user_name; ?><span><?php echo $comment->user_name; ?></span></h6>
                                <p><?php echo $comment->comment; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Your Comment</h5>
                    </div>
                    <form method="POST" action="<?php echo APPURL; ?>show-watching.php?id=<?php echo $id; ?>&ep=<?php echo $ep; ?>">
                        <textarea name="comment" placeholder="Your Comment"></textarea>
                        <input type="hidden" name="show_id" value="<?php echo $id; ?>">
                        <button name="inserting_comment" type="submit"><i class="fa fa-location-arrow"></i>comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Anime Section End -->

<!-- Footer Section Begin -->


<?php require "includes/footer.php" ?>