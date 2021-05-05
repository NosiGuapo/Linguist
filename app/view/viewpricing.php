<div class="pagetitle">
    <h1>Pricing</h1>
</div>
<div class="princing_tables">

    <?php $table = 1; ?>
    <?php if ($user->getSubscription() >= $table){ ?>
    <div id="subscriptionStatus" class="subscriptionOutperformed">
        <?php } else { ?>
        <div id="subscriptionStatus">
            <?php } ?>
            <div class="table_free">
                <div class="table_title">
                    <h1><?= $pricingList[$table]->getSubscriptionName(); ?></h1>
                </div>
                <div class="table_price">
                    <h3><?= $pricingList[$table]->getSubscriptionPrice(); ?> $</h3>
                    <span><?= $pricingList[$table]->getSubscriptionPrice(); ?></span>
                    <p>$</p>
                </div>
                <div class="table_features">
                    <p><?= $pricingList[$table]->getSubscriptionWording(); ?></p>
                </div>
                <div class="table_purchase">
                    <?php echo "<a href='./?action=purchase&sId=" . $pricingList[$table]->getSubscriptionId() . "'>Purchase"; ?>
                    <i class="fal fa-arrow-to-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <?php $table = 2; ?>
        <?php if ($user->getSubscription() >= $table){ ?>
        <div id="subscriptionStatus" class="subscriptionOutperformed">
            <?php } else { ?>
            <div id="subscriptionStatus">
                <?php } ?>
                <div class="table_essential">
                    <div class="table_title">
                        <h1><?= $pricingList[$table]->getSubscriptionName(); ?></h1>
                    </div>
                    <div class="table_price">
                        <h3><?= $pricingList[$table]->getSubscriptionPrice(); ?> $</h3>
                        <span><?= $pricingList[$table]->getSubscriptionPrice(); ?></span>
                        <p>$</p>
                    </div>
                    <div class="table_features">
                        <p><?= $pricingList[$table]->getSubscriptionWording(); ?></p>
                    </div>
                    <div class="table_purchase">
                        <?php echo "<a href='./?action=purchase&sId=" . $pricingList[$table]->getSubscriptionId() . "'>Purchase"; ?>
                        <i class="fal fa-arrow-to-right"></i>
                        </a>
                    </div>
                </div>
            </div>


            <?php $table = 3; ?>
            <?php if ($user->getSubscription() >= $table){ ?>
            <div id="subscriptionStatus" class="subscriptionOutperformed">
                <?php } else { ?>
                <div id="subscriptionStatus">
                    <?php } ?>
                    <div class="table_global">
                        <div class="table_title">
                            <h1><?= $pricingList[$table]->getSubscriptionName(); ?></h1>
                        </div>
                        <div class="table_price">
                            <h3><?= $pricingList[$table]->getSubscriptionPrice(); ?> $</h3>
                            <span><?= $pricingList[$table]->getSubscriptionPrice(); ?></span>
                            <p>$</p>
                        </div>
                        <div class="table_features">
                            <p><?= $pricingList[$table]->getSubscriptionWording(); ?></p>
                        </div>
                        <div class="table_purchase">
                            <?php echo "<a href='./?action=purchase&sId=" . $pricingList[$table]->getSubscriptionId() . "'>Purchase"; ?>
                            <i class="fal fa-arrow-to-right"></i>
                            </a>
                        </div>
                        <div id="table_background"></div>
                    </div>
                </div>
            </div>
