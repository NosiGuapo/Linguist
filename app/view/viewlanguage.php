<div class="canvas">
    <div class="canvas--wraith"></div>
    <div class="canvas--background"></div>
    <div class="canvas--opacityfix"></div>
    <style>
        .canvas--background {
            background-image: url(" <?php echo $language->getLanguageImg(); ?> ");
        }
    </style>
</div>
<div class="languagebox">
    <div class="languagetitle">
        <img src="<?= $language->getLanguageIcon() ?>">
        <h1><?= $language->getLanguageName(); ?></h1>
    </div>
    <div class="languagedesc">
        <h4><?= $language->getLanguageWording(); ?></h4>
        <p>Is <span><?= $language->getLanguageName(); ?></span> the language you wish to learn? If so, press the
            "confirm" button below.</p>
    </div>
    <div class="language_button">
        <?php echo "<a href='./?action=learn&lId=" . $language->getLanguageId() . "'>Learn " . $language->getLanguageName(); ?>
        <i class="fal fa-arrow-to-right"></i>
        </a>
    </div>
    <!--        <div class="cardbutton">-->
    <!--            <a href="">Check lesson</a>-->
    <!--        </div>-->
</div>
</body>
</html>

