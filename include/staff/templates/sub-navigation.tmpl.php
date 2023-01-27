<?php
if (!$nav || !($subnav = $nav->getSubMenu()) || !is_array($subnav))
    return;

$activeMenu = $nav->getActiveMenu();
if ($activeMenu > 0 && !isset($subnav[$activeMenu - 1]))
    $activeMenu = 0;

$info = $nav->getSubNavInfo();
?>
<nav class="jb-overflowmenu <?php echo @$info['class']; ?> navbar navbar-expand-sm" id="<?php echo $info['id']; ?>">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsed_nav"
            aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsed_nav">
            <ul id="sub_nav" class="nav navbar-nav">
                <?php
                foreach ($subnav as $k => $item) {
                    if (is_callable($item)) {
                        if ($item($nav) && !$activeMenu)
                            $activeMenu = 'x';
                        continue;
                    }
                    if (isset($item['droponly']))
                        continue;
                    $class = $item['iconclass'];
                    if (
                        $activeMenu && $k + 1 == $activeMenu
                        or (!$activeMenu
                            && (
                                strpos(
                                    strtoupper($item['href']),
                                    strtoupper(basename($_SERVER['SCRIPT_NAME']))
                                ) !== false
                                or ($item['urls']
                                    && in_array(
                                        basename($_SERVER['SCRIPT_NAME']),
                                        $item['urls']
                                    )
                                )
                            ))
                    )
                        $class = "$class active";
                    if (!($id = $item['id']))
                        $id = "subnav$k";

                    //Extra attributes
                    $attr = '';
                    if (isset($item['attr']))
                        foreach ($item['attr'] as $name => $value)
                            $attr .= sprintf("%s='%s' ", $name, $value);

                    if ($id == "new-ticket") {
                        $attr .= "data-bs-toggle='modal' ";
                        $attr .= "data-bs-target='#popup' ";
                        // continue;
                    }
                    echo sprintf(
                        '<li class="row"><a class="%s" href="%s" title="%s" id="%s" %s>%s</a></li>',
                        $class, $item['href'], $item['title'],
                        $id,
                        $attr, $item['desc']
                    );
                }
                ?>
            </ul>

        </div>

    </div>
</nav>