<div class="pagetitle">
    <h1>Your lessons</h1>
</div>
<form class="searchform" method="post" action="./?action=searchLesson">
    <div class="searchbar">
        <input class="searchinput" name="searchbarLesson" type="search" placeholder="Search for a lesson...">
        <div class="searchbutton">
            <input type="submit" name="searchLesson" value="Go">
        </div>
        <?php if (isset($_POST['searchLesson'])) { ?>
            <div class="searchParameter">
                <p><?= $_POST['searchbarLesson'] ?></p>
                <a href="?action=lessons"><i class="fas fa-times"></i></a>
            </div>
        <?php } ?>
    </div>
</form>
<div class="lessonstab">
    <div class="cards">
        <?php if (empty($lessons)) { ?>
            <p class="emptySearch">No result found.</p>
        <?php } else {
            foreach ($lessons as $k => $v) { ?>
                <style>
                    <?php echo "#cardimg".$v->getLessonId()?>
                    {
                        background-image: url("<?php echo $v->getIllustrationPath()?>")
                    ;
                    }
                </style>
                <div class="card">
                    <?php echo "<div class='cardimg' id='cardimg" . $v->getLessonId() . "'></div>" ?>
                    <div class="cardcontent">
                        <div class="cardwrap">
                            <h1 class="cardtitle"><?= $v->getName(); ?></h1>
                            <div class="cardwording"><?= $v->getWording(); ?></div>
                        </div>
                        <div class="cardbutton">
                            <a href='./?action=openlesson&lessId=<?= $v->getLessonId() ?>'>Check lesson </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>