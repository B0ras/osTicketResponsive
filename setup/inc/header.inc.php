<?php
if ($cfg)
    header("Content-Security-Policy: frame-ancestors " . $cfg->getAllowIframes() . ";");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html <?php if ( ($lang = Internationalization::getCurrentLanguage()) &&
    ($info = Internationalization::getLanguageInfo($lang)) && (@$info['direction'] == 'rtl') )
    echo 'dir="rtl" class="rtl"';
// Dropped IE Support Warning if (osTicket::is_ie()) $warning=__('osTicket no longer supports Internet Explorer.');
?>>

<head>
    <title>
        <?php echo $wizard['title']; ?>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- <link rel="stylesheet" href="css/wizard.css"> -->
    <link type="text/css" rel="stylesheet" href="css/wizard_responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="<?php echo ROOT_PATH; ?>css/flags.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</head>

<body class="">
    <div id="wizard" class="container-fluid">
        <?php if ($warning)
            echo sprintf('<div class="warning_bar">%s</div>', $warning); ?>
        <div id="header" class="row">
            <img id="logo" src="./images/<?php echo $wizard['logo'] ?: 'logo.png'; ?>" alt="osTicket">
            <div class="info">
                <?php echo $wizard['tagline']; ?>
            </div>
            <br />
            <ul class="links row">
                <li>
                    <div class="row justify-content-end">

                        <?php
                        foreach ($wizard['menu'] as $k => $v)
                            echo sprintf('<div class="col-sm-auto row">
                                <a class="col" target="_blank" href="%s">%s</a>
                                <div class="d-none d-sm-block col-1">
                                    &mdash;
                                </div>
                            </div> ', $v, $k);
                        ?>
                        <a class="col-sm-auto last" target="_blank" href="https://osticket.com/contact-us">
                            <?php echo __('Contact Us'); ?>
                        </a>
                    </div>
                </li>
            </ul>
            <div class="flags">
                <?php
                if (
                    ($all_langs = Internationalization::availableLanguages())
                    && (count($all_langs) > 1)
                ) {
                    foreach ($all_langs as $code => $info) {
                        list($lang, $locale) = explode('_', $code);
                ?>
                <a class="flag flag-<?php echo strtolower($locale ?: $info['flag'] ?: $lang); ?>" href="?<?php echo urlencode($_GET['QUERY_STRING']); ?>&amp;lang=<?php echo $code;
                                 ?>"
                    title="<?php echo Internationalization::getLanguageDescription($code); ?>">&nbsp;</a>
                <?php }
                } ?>
            </div>
        </div>
        <div class="clear"></div>
        <div id="content" class="col px-4">