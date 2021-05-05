<div class="profileBox">
    <?php if (isset($_POST['profileEdit']) == false) { ?>

        <div class="text">
            <div class="profileUsername">
                <p id="phpProfileSelecter">
                    <span>Username: </span>
                    <?= $user->getUserName() ?>
                </p>
            </div>
            <div class="profileEmail">
                <p id="phpProfileSelecter">
                    <span>E-mail: </span>
                    <?= $user->getUserMail() ?>
                </p>
            </div>
            <div class="profileFullname">
                <p id="phpProfileSelecter">
                    <span>Name: </span>
                    <?= $user->getUserFname() ?> <?= $user->getUserLname(); ?>
                </p>
            </div>
            <div class="profileLanguages">
                <p id="phpProfileSelecter"><span>Your languages: </span></p>
                <?php if (!$languages) { ?>
                    <p>You aren't currently learning any language.</p>
                <?php } else {
                    foreach ($languages as $k => $v) { ?>
                        <img alt="language_icon" src="<?= $v->getLanguageIcon(); ?>"/>
                    <?php } ?>
                <?php } ?>
            </div>
            <form action="./?action=profile" method="post">
                <input id="profileButton" class="editButton" type="submit" name="profileEdit" value="Edit profile">
            </form>
            <a href="./?action=deleteAccount">
                <button id="profileButton" class="delButton">Delete account</button>
            </a>
        </div>

    <?php } else { ?>

        <div class="modif">
            <form action="./?action=editProfile" method="post">
                <div class="profileUsername">
                    <p id="phpProfileSelecter">
                        <span>Username: </span>
                        <input class="parametterInput" type="text" name="userName-edit"
                               value="<?= $user->getUserName(); ?>">
                    </p>
                </div>
                <div class="profileEmail">
                    <p id="phpProfileSelecter">
                        <span>E-mail: </span>
                        <input class="parametterInput" type="text" name="userMail-edit"
                               value="<?= $user->getUserMail() ?>">
                    </p>
                </div>
                <div class="profileFullname">
                    <p id="phpProfileSelecter">
                        <span>Name: </span>
                        <input class="parametterInput" type="text" name="userFname-edit"
                               value="<?= $user->getUserFname(); ?>">
                        <input class="parametterInput" type="text" name="userLname-edit"
                               value="<?= $user->getUserLname(); ?>">
                    </p>
                </div>
                <input id="profileButton" class="editButton" type="submit" name="saveEdits" value="Save">
            </form>
        </div>

    <?php } ?>
</div>
