<div class="canvas">
    <div class="canvas--wraith"></div>
    <div class="canvas--background"></div>
    <div class="canvas--opacityfix"></div>
    <style>
        .canvas--background {
            background-image: url(" <?php echo $thisLesson->getIllustrationPath(); ?>");
        }
    </style>
</div>
<div class="lessontitle">
    <h1><?= $thisLesson->getName(); ?></h1>
    <h3><?= $thisLesson->getWording(); ?></h3>
</div>
<div class="lesson-shape"></div>
<div class="lessonbody">
    <p><?= $thisLesson->getContent(); ?></p>
</div>
</body>
</html>

