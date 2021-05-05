<label>
    <input type="checkbox" class="burgercheckbox"/>
</label>
<div id="burger-logo">
    <div></div>
    <div></div>
    <div></div>
</div>
<header class="mainheader">
    <nav role="navigation">
        <ul class="headerUl">
            <li><a href="./?action=home"><i class="fas fa-home"></i></a></li>
            <li class="dropdown"><a><i class="fas fa-user-circle"></i></a>
                <div class="dropdown_content">
                    <ul>
                        <div class="triangle-up"></div>
                        <?php if ($logState) { ?>
                            <li><a href="./?action=profile">Profile</a></li>
                            <li><a href="./?action=logout">Sign Out</a></li>
                        <?php } else { ?>
                            <li><a href="./?action=login"">Sign In</a></li>
                            <li><a href="./?action=register">Sign Up</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </li>
            <?php if ($logState) { ?>
                <li class="dropdown"><a><i class="fad fa-globe-americas"></i></a>
                    <div class="dropdown_content">
                        <ul>
                            <div class="triangle-up"></div>
                            <?php foreach ($displayLang as $k => $v) { ?>
                                <li>
                                    <a href='./?action=language&lId=<?= $v->getLanguageId() ?>'><?= $v->getLanguageName() ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </li>
                <li><a href="./?action=lessons"><i class="fad fa-graduation-cap"></i></a></li>
                <li><a href="./?action=pricing"><i class="fas fa-tag"></i></a></li>
            <?php } ?>
        </ul>
    </nav>
</header>
