<div class="canvas" id="canvasmain">
    <div class="canvas--background"></div>
    <div class="canvas--opacityfix"></div>
</div>
<div class="maincontent">
    <small>Welcome to...</small>
    <h1>Linguist</h1>
</div>
<div class="main-shape"></div>
<div class="main-box1">
    <div class="langbox">
        <h2>I want to learn...</h2>
        <div class="langflags">
            <?php foreach ($displayLang

            as $k => $v){ ?>
            <a href='./?action=language&lId=<?= $v->getLanguageId(); ?>'>
                <img class="lbflags" alt="<?= $v->getLanguageName(); ?>" src="<?= $v->getLanguageIcon(); ?>">
                <p class="lbsubtext"><?= $v->getLanguageName(); ?></p>
                <?php } ?>
        </div>
    </div>
    <div class="descbox">
        <h1>Our method:</h1>
        <div class="descbox1" id="descpart">
            <h3>Start speaking right away</h3>
            <p>Learn to speak a new language naturally and conversationally.</p>
        </div>
        <div class="descbox2" id="descpart">
            <h3>Learn and review on your own schedule</h3>
            <p>Learn easily and get the guidance and tools you always needed to build a successful learning habit.</p>
        </div>
        <div class="descbox3" id="descpart">
            <h3>Progress and get results</h3>
            <p>Obtain results by learning from lessons.</p>
        </div>
    </div>
</div>
