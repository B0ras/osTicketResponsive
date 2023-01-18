<h1><?php echo __('Forgot My Password'); ?></h1>
<p>
    <?php echo __(
        'Enter your username or email address in the form below and press the <strong>Send Email</strong> button to have a password reset link sent to your email account on file.'
    );
    ?>

<form action="pwreset.php" method="post" id="clientLogin" class="row">
    <div class="col-12 col-sm-9">
        <?php echo __(
            'If the information provided is valid a password reset email will be sent to the email address you have on file. If you do not receive the email or have trouble reseting your password, please contact support.'
        ); ?>
    </div>
    <div class="lock-icon col-12 col-sm-4">
        <img class="lock-icon" src="assets/default/images/lock.png?1319655200" alt="">
    </div>
</form>