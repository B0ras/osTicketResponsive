<?php
if (!defined('SETUPINC'))
    die('Kwaheri!');

// Icons
$yes = "bi-check-square yes";
$no = "bi-x-square no";

?>

<div id="main" class="container col-12">
    <h2 class="row text-start underline">
        <?php echo __('Thank You for Choosing osTicket!'); ?>
    </h2>
    <div id="intro" class="container">
        <p class="row text-wrap ">
            <?php echo __('We are delighted you have chosen osTicket for your customer support ticketing system!'); ?>
        </p>
        <p class="row text-wrap">
            <?php echo __("The installer will guide you every step of the way in the installation process. You're minutes away from your awesome customer support system!"); ?>
        </p>
    </div>
    <h2 class="row text-start underline">
        <?php echo __('Prerequisites'); ?>
    </h2>
    <p class="col-11 text-start mr-5">
        <?php echo __("Before we begin, we'll check your server configuration to make sure you meet the minimum requirements to run the latest version of osTicket."); ?>
    </p>
    <h3 class="underline">
        <?php echo __('Required'); ?>: <font color="red">
            <?php echo $errors['prereq']; ?>
        </font>
    </h3>
    <?php echo __('These items are necessary in order to install and use osTicket.'); ?>
    <ul class="progress row col-12 bi">
        <li>
            <i class="<?php echo $installer->check_php() ? $yes : $no; ?>"></i>
            <?php echo sprintf(__('%s or greater'), '<span class="ltr">PHP v' . SetupWizard::getPHPVersion() . '</span>'); ?>
            &mdash; <small class="ltr">(<b>
                    <?php echo PHP_VERSION; ?>
                </b>)</small>
        </li>
        <li>
            <i class="<?php echo $installer->check_mysql() ? $yes : $no; ?>"></i>
            <?php echo __('MySQLi extension for PHP'); ?> &mdash; <small><b>
                    <?php
                    echo extension_loaded('mysqli') ? __('module loaded') : __('missing!'); ?>
                </b></small>
        </li>
    </ul>
    <h3 class="underline">
        <?php echo __('Recommended'); ?>:
    </h3>
    <div class="col-12">
        <?php echo __('You can use osTicket without these, but you may not be able to use all features.'); ?>
    </div>
    <ul class="progress row col-12">
        <li>
            <i class="<?php echo extension_loaded('gd') ? $yes : $no; ?>"></i>
            Gdlib
            <?php echo __('Extension'); ?>
        </li>
        <li>
            <i class="<?php echo extension_loaded('imap') ? $yes : $no; ?>"></i>
            PHP IMAP
            <?php echo __('Extension'); ?> &mdash; <em>
                <?php
                echo __('Required for mail fetching'); ?>
            </em>
        </li>
        <li>
            <i class=" <?php echo extension_loaded('xml') ? $yes : $no; ?>"></i>
            PHP XML
            <?php echo __('Extension'); ?>
            <?php
            echo __('(for XML API)'); ?>
        </li>
        <li>
            <i class="<?php echo extension_loaded('dom') ? $yes : $no; ?>"></i>
            PHP XML-DOM
            <?php echo __('Extension'); ?>
            <?php
            echo __('(for HTML email processing)'); ?>
        </li>
        <li>
            <i class="<?php echo extension_loaded('json') ? $yes : $no; ?>"></i>
            PHP JSON
            <?php echo __('Extension'); ?>
            <?php
            echo __('(faster performance)'); ?>
        </li>
        <li>
            <i class="<?php echo extension_loaded('mbstring') ? $yes : $no; ?>"></i>
            Mbstring
            <?php echo __('Extension'); ?> &mdash;
            <?php
            echo __('recommended for all installations'); ?>
        </li>
        <li>
            <i class="<?php echo extension_loaded('phar') ? $yes : $no; ?>"></i>
            Phar
            <?php echo __('Extension'); ?> &mdash;
            <?php
            echo __('recommended for plugins and language packs'); ?>
        </li>
        <li>
            <i class="<?php echo extension_loaded('intl') ? $yes : $no; ?>"></i>
            Intl
            <?php echo __('Extension'); ?> &mdash;
            <?php
            echo __('recommended for improved localization'); ?>
        </li>
        <li>
            <i class="<?php echo extension_loaded('apcu') ? $yes : $no; ?>"></i>
            APCu
            <?php echo __('Extension'); ?> &mdash;
            <?php
            echo __('(faster performance)'); ?>
        </li>
        <li>
            <i class="<?php echo extension_loaded('Zend OPcache') ? $yes : $no; ?>"></i>
            Zend OPcache
            <?php echo __('Extension'); ?> &mdash;
            <?php
            echo __('(faster performance)'); ?>
        </li>
    </ul>
    <div id="sidebar" class="col-12 accordion">
        <?php require(INC_DIR . 'help-accordion.inc.php'); ?>
    </div>
    <div id="bar">
        <form method="post" action="install.php">
            <input type="hidden" name="s" value="prereq">
            <button type="submit" class="btn btn-primary">
                <?php echo __('Continue'); ?> &raquo;
            </button>
            <!-- <input class="btn-primary" type="submit" name="submit"> -->
        </form>
    </div>
</div>