<?php
if (!defined('SETUPINC'))
    die('Kwaheri!');
$info = ($_POST && $errors) ? Format::htmlchars($_POST) : array('prefix' => 'ost_', 'dbhost' => 'localhost', 'lang_id' => 'en_US');
?>
<div id="main" class="step2">
    <h1 class="underline">
        <?php echo __('osTicket Basic Installation'); ?>
    </h1>
    <p>
        <?php echo __('Please fill out the information below to continue your osTicket installation. All fields are required.'); ?>
    </p>
    <font class="error"><strong>
            <?php echo $errors['err']; ?>
        </strong></font>
    <form action="install.php" method="post" id="install">
        <input type="hidden" name="s" value="install">
        <h4 class="head system underline">
            <?php echo __('System Settings'); ?>
        </h4>
        <span class="subhead">
            <?php echo __('The URL of your helpdesk, its name, and the default system email address'); ?>
        </span>
        <div>
            <label>
                <?php echo __('Helpdesk URL'); ?>:
            </label>
            <span class="ltr"><strong>
                    <?php echo URL; ?>
                </strong></span>
        </div>
        <div>
            <div class="form-floating">
                <input id="inputHelpName" class="form-control" type="text" name="name" size="45" tabindex="1"
                    value="<?php echo $info['name']; ?>" placeholder="name">
                <label for="inputHelpName">
                    <?php echo __('Helpdesk Name'); ?>:
                </label>
                <a class=" tip" href="#helpdesk_name"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['name']; ?>
                </font>
            </div>
        </div>
        <div>
            <div class="form-floating">
                <input id="inputDefaultName" class="form-control" type="text" name="email" size="45" tabindex="2"
                    value="<?php echo $info['email']; ?>" placeholder="name@example.com">
                <label for="inputDefaultName">
                    <?php echo __('Default Email'); ?>:
                </label>
                <a class=" tip" href="#system_email"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['email']; ?>
                </font>
            </div>
        </div>
        <div>
            <div class="form-floating">
                <?php $langs = Internationalization::availableLanguages(); ?>
                <select id="selectLanguage" class="form-select" name="lang_id">
                    <?php foreach ($langs as $l) {
                        $selected = ($info['lang_id'] == $l['code']) ? 'selected="selected"' : ''; ?>
                    <option value="<?php echo $l['code']; ?>" <?php echo $selected; ?>>
                        <?php echo Internationalization::getLanguageDescription($l['code']); ?>
                    </option>
                    <?php } ?>
                </select>
                <label for="selectLanguage">
                    <?php echo __('Primary Language'); ?>:
                </label>
            </div>
            <a class="tip" href="#default_lang"><i class="icon-question-sign help-tip"></i></a>
            <font class="error">&nbsp;
                <?php echo $errors['lang_id']; ?>
            </font>
        </div>

        <h4 class="head admin underline">
            <?php echo __('Admin User'); ?>
        </h4>
        <span class="subhead">
            <?php echo __('Your primary administrator account - you can add more users later.'); ?>
        </span>
        <div>
            <div class="form-floating">
                <input id="inputFName" class="form-control" type="text" name="fname" size="45" tabindex="3"
                    value="<?php echo $info['fname']; ?>" placeholder="first name">
                <label for="inputFName">
                    <?php echo __('First Name'); ?>:
                </label>
                <a class="tip" href="#first_name"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['fname']; ?>
                </font>
            </div>
        </div>
        <div>
            <div class="form-floating">
                <input id="inputLName" class="form-control" type="text" name="lname" size="45" tabindex="4"
                    value="<?php echo $info['lname']; ?>" placeholder="last name">
                <label for="inputLName">
                    <?php echo __('Last Name'); ?>:
                </label>
                <a class="tip" href="#last_name"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['lname']; ?>
                </font>
            </div>
        </div>
        <div>
            <div class="form-floating">
                <input id="inputEmail" class="form-control" type="text" name="admin_email" size="45" tabindex="5"
                    value="<?php echo $info['admin_email']; ?>" placeholder="email">
                <label for="inputEmail">
                    <?php echo __('Email Address'); ?>:
                </label>
                <a class="tip" href="#email"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['admin_email']; ?>
                </font>
            </div>
        </div>
        <div>
            <div class="form-floating">
                <input id="inputUsername" class="form-control" type="text" name="username" size="45" tabindex="6"
                    value="<?php echo $info['username']; ?>" autocomplete="off" placeholder="username">
                <label for="inputUsername">
                    <?php echo __('Username'); ?>:
                </label>
                <a class="tip" href="#username"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['username']; ?>
                </font>
            </div>
        </div>
        <div>
            <div class="form-floating">
                <input id="inputPassword" class="form-control" type="password" name="passwd" size="45" tabindex="7"
                    value="<?php echo $info['passwd']; ?>" autocomplete="off" placeholder="password">
                <label for="inputPassword">
                    <?php echo __('Password'); ?>:
                </label>
                <a class="tip" href="#password"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['passwd']; ?>
                </font>
            </div>
        </div>
        <div>
            <div class="form-floating">
                <input id="inputPassword2" class="form-control" type="password" name="passwd2" size="45" tabindex="8"
                    value="<?php echo $info['passwd2']; ?>" placeholder="password retype">
                <label for="inputPassword2">
                    <?php echo __('Retype Password'); ?>:
                </label>
                <a class="tip" href="#password2"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['passwd2']; ?>
                </font>
            </div>
        </div>

        <h4 class="head database underline">
            <?php echo __('Database Settings'); ?>
        </h4>
        <span class="subhead">
            <?php echo __('Database connection information'); ?>
            <font class="error">
                <?php echo $errors['db']; ?>
            </font>
        </span>
        <div>
            <div class="form-floating">
                <input id="inputPrefix" class="form-control" type="text" name="prefix" size="45" tabindex="9"
                    value="<?php echo $info['prefix']; ?>" placeholder="prefix db">
                <label for="inputPrefix">
                    <?php echo __('MySQL Table Prefix'); ?>:
                </label>
                <a class="tip" href="#db_prefix"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['prefix']; ?>
                </font>
            </div>
        </div>
        <div>
            <div class="form-floating">
                <input id="inputHost" class="form-control" type="text" name="dbhost" size="45" tabindex="10"
                    value="<?php echo $info['dbhost']; ?>" placeholder="db host">
                <label for="inputHost">
                    <?php echo __('MySQL Hostname'); ?>:
                </label>
                <a class="tip" href="#db_host"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['dbhost']; ?>
                </font>
            </div>
        </div>
        <div>
            <div class="form-floating">
                <input id="inputDB" class="form-control" type="text" name="dbname" size="45" tabindex="11"
                    value="<?php echo $info['dbname']; ?>" placeholder="db name">
                <label for="inputDB">
                    <?php echo __('MySQL Database'); ?>:
                </label>
                <a class="tip" href="#db_schema"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['dbname']; ?>
                </font>
            </div>
        </div>
        <div>
            <div class="form-floating">
                <input id="inputUser" class="form-control" type="text" name="dbuser" size="45" tabindex="12"
                    value="<?php echo $info['dbuser']; ?>" placeholder="db user">
                <label for="inputUser">
                    <?php echo __('MySQL Username'); ?>:
                </label>
                <a class="tip" href="#db_user"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['dbuser']; ?>
                </font>
            </div>
        </div>
        <div>
            <div class="form-floating">
                <input id="inputPass" class="form-control" type="password" name="dbpass" size="45" tabindex="13"
                    value="<?php echo $info['dbpass']; ?>" placeholder="db password">
                <label for="inputPass">
                    <?php echo __('MySQL Password'); ?>:
                </label>
                <a class="tip" href="#db_password"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">
                    <?php echo $errors['dbpass']; ?>
                </font>
            </div>
        </div>
        <br>
        <div id="bar">
            <input class="btn btn-primary" class="btn" type="submit" value="<?php echo __('Install Now'); ?>"
                tabindex="14">
        </div>

        <input type="hidden" name="timezone" id="timezone" />
    </form>
</div>
<!-- <div>
    <p><strong>
            <?php echo __('Need Help?'); ?>
        </strong>
        <?php echo __('We provide <u>professional installation services</u> and commercial support.'); ?> <a
            target="_blank" href="https://osticket.com/support">
            <?php echo __('Learn More!'); ?>
        </a>
    </p>
</div> -->
<!-- <div id="overlay"></div> -->
<!-- <div id="loading">
    <h4>
        <?php echo __('Doing stuff!'); ?>
    </h4>
    <?php echo __('Please wait... while we install your new support ticket system!'); ?>
</div> -->