<?php
if (!defined('OSTCLIENTINC'))
    die('Access Denied');

$userid = Format::input($_POST['userid']);
?>
<h1>
    <?php echo __('Forgot My Password'); ?>
</h1>
<p>
    <?php echo __(
        'Enter your username or email address in the form below and press the <strong>Send Email</strong> button to have a password reset link sent to your email account on file.'
    );
    ?>

<form action="pwreset.php" method="post" id="clientLogin" class="row">
    <div class="col-12 col-sm-8">
        <?php csrf_token(); ?>
        <input type="hidden" name="do" value="sendmail" />
        <strong><?php echo Format::htmlchars($banner); ?></strong>
        <br>
        <div>
            <label for="username">
                <?php echo __('Username'); ?>:
            </label>
            <input class="form-control" id="username" type="text" name="userid" size="30"
                value="<?php echo $userid; ?>">
        </div>
        <p>
            <input class="btn btn-outline-orange" type="submit" value="<?php echo __('Send Email'); ?>">
        </p>
    </div>
    <div class="lock-icon col-12 col-sm-4">
        <img class="lock-icon" src="assets/default/images/lock.png?1319655200" alt="">
    </div>
</form>