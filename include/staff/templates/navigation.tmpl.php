<?php
if ($nav && ($tabs = $nav->getTabs()) && is_array($tabs)) {
    foreach ($tabs as $name => $tab) {
        if ($tab['href'][0] != '/')
            $tab['href'] = ROOT_PATH . 'scp/' . $tab['href'];
        echo sprintf(
            '<li class="%s %s nav-item dropdown">
                <a href="%s" class="nav-link dropdown-toggle" %s>
                    %s
                </a>',
            isset($tab['active']) ? 'active' : 'inactive',
            @$tab['class'] ?: '',
            $tab['href'],
            // Tickets tab has no submenu so we enable the ability to click on the link. Otherwise it is impossible to go to tickets
            $tab['desc'] == "Tickets" ? '' : 'data-bs-toggle="dropdown"',
            $tab['desc']
        );
        if (!isset($tab['active']) && ($subnav = $nav->getSubMenu($name))) {
            echo "<ul class='dropdown-menu'>\n";
            foreach ($subnav as $k => $item) {
                if (isset($item['id']) && !($id = $item['id']))
                    $id = "nav$k";
                if ($item['href'][0] != '/')
                    $item['href'] = ROOT_PATH . 'scp/' . $item['href'];

                echo sprintf(
                    '<li><a class="%s" href="%s" title="%s" id="%s">%s</a></li>',
                    $item['iconclass'],
                    $item['href'], $item['title'] ?? null,
                    $id ?? null, $item['desc']
                );
            }
            echo "\n</ul>\n";
        }
        echo "\n</li>\n";
    }
} ?>