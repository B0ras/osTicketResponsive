</div>
</div>
<?php if (!isset($_SERVER['HTTP_X_PJAX'])) { ?>
    <div id="footer">
        <?php echo __('Copyright &copy;') ?> 2006-<?php echo date('Y'); ?>&nbsp;<?php

               echo Format::htmlchars((string) $ost->company ?: 'osTicket.com'); ?>&nbsp;<?php echo __('All Rights Reserved.'); ?>
    </div>
    <?php
    if (is_object($thisstaff) && $thisstaff->isStaff()) { ?>
        <div>
            <!-- Do not remove <img src="autocron.php" alt="" width="1" height="1" border="0" /> or your auto cron will cease to function -->
            <img src="<?php echo ROOT_PATH; ?>scp/autocron.php" alt="" width="1" height="1" border="0" />
            <!-- Do not remove <img src="autocron.php" alt="" width="1" height="1" border="0" /> or your auto cron will cease to function -->
        </div>
    <?php
    } ?>
    </div>
    <!-- <div id="overlay"></div>
                    <div id="loading">
                        <i class="icon-spinner icon-spin icon-3x pull-left icon-light"></i>
                        <h1><?php echo __('Loading ...'); ?></h1>
                    </div>
                    <div class="dialog draggable" style="display:none;" id="popup">
                        <div id="popup-loading">
                            <h1 style="margin-bottom: 20px;"><i class="icon-spinner icon-spin icon-large"></i>
                                <?php echo __('Loading ...'); ?>
                            </h1>
                        </div>

                        <div class="body"></div>
                    </div>
                    <div style="display:none;" class="dialog" id="alert">
                        <h3><i class="icon-warning-sign"></i> <span id="title"></span></h3>
                        <a class="close" href=""><i class="icon-remove-circle"></i></a>
                        <hr />
                        <div id="body" style="min-height: 20px;"></div>
                        <hr style="margin-top:3em" />
                        <p class="full-width">
                            <span class="buttons pull-right">
                                <input type="button" value="<?php echo __('OK'); ?>" class="close ok">
                            </span>
                        </p>
                        <div class="clear"></div>
                    </div> -->

    <div class="modal fade body" id="popup" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Lookup or create a user</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <p id="msg_info"><i class="icon-info-sign"></i>&nbsp; Search existing users or add a new user.</p>
                    </div>
                    <div style="margin-bottom:10px;">
                        <input type="text" class="search-input" style="width:100%;"
                            placeholder="Search by email, phone or name" id="user-search" autofocus="" autocorrect="off"
                            autocomplete="off">
                    </div>
                    <div id="selected-user-info" style="display:none;margin:5px;">
                        <form method="post" class="user" action="#users/lookup">
                            <input type="hidden" id="user-id" name="id" value="0">
                            <i class="icon-user icon-4x pull-left icon-border"></i>
                            <a class="action-button pull-right" style="overflow:inherit" id="unselect-user" href="#"><i
                                    class="icon-remove"></i>
                                Add New User </a>
                            <div class="clear"></div>
                            <hr>
                            <p class="full-width">
                                <span class="buttons pull-left">
                                    <input type="button" name="cancel" class="close" value="Cancel">
                                </span>
                                <span class="buttons pull-right">
                                    <input type="submit" value="Continue">
                                </span>
                            </p>
                        </form>
                    </div>
                    <div id="new-user-form" style="display:block;">
                        <form method="post" class="user" action="#users/lookup/form">
                            <table width="100%" class="fixed">
                                <tbody>
                                    <tr>
                                        <td style="width:150px;"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                            <em>
                                                <strong>Create New User</strong>:
                                                <div></div>
                                            </em>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="multi-line required" style="min-width:120px;">
                                            Email Address:</td>
                                        <td>
                                            <div style="position:relative"> <input type="email" id="_93cceee9e0d198"
                                                    size="40" maxlength="64" placeholder="" name="93cceee9e0d198" value="">
                                                <span class="error">*</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="multi-line required" style="min-width:120px;">
                                            Full Name:</td>
                                        <td>
                                            <div style="position:relative"> <input type="text" id="_46eebad8bea73a"
                                                    size="40" maxlength="64" placeholder="" name="46eebad8bea73a" value="">
                                                <span class="error">*</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="multi-line " style="min-width:120px;">
                                            Phone Number:</td>
                                        <td>
                                            <div style="position:relative"> <input id="_f3b06a9fac1169" type="tel"
                                                    name="f3b06a9fac1169" value=""> Ext:
                                                <input type="text" name="f3b06a9fac1169-ext" value="" size="5">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="multi-line " style="min-width:120px;">
                                            Internal Notes:</td>
                                        <td>
                                            <div style="position:relative"> <span style="display:inline-block;width:100%"
                                                    class="-redactor-container">
                                                    <div class="redactor-box redactor-blur redactor-styles-on" dir="ltr">
                                                        <span class="redactor-voice-label" id="redactor-voice-2"
                                                            aria-hidden="false">Rich text editor</span>
                                                        <div class="redactor-styles no-pjax redactor-in redactor-in-2"
                                                            dir="ltr" aria-labelledby="redactor-voice-2" role="presentation"
                                                            spellcheck="true" lang="en-US" contenteditable="true"
                                                            style="min-height: 75px; max-height: 75px;">
                                                            <p></p>
                                                        </div><textarea rows="4" cols="40"
                                                            class="richtext no-bar small redactor-source" placeholder=""
                                                            id="_15c56dc72e4166" name="15c56dc72e4166"
                                                            data-redactor-uuid="2" domtargetshow=""
                                                            style="display: none;"></textarea>
                                                        <ul dir="ltr" class="redactor-statusbar"></ul>
                                                    </div>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <p class="full-width">
                                <span class="buttons pull-left">
                                    <input type="reset" value="Reset">
                                    <input type="button" name="cancel" class="close" value="Cancel">
                                </span>
                                <span class="buttons pull-right">
                                    <input type="submit" value="Add User">
                                </span>
                            </p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/jquery.pjax.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>scp/js/bootstrap-typeahead.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/jquery-ui-1.13.1.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/jquery-ui-sliderAccess.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>scp/js/scp.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/filedrop.field.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>scp/js/tips.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/redactor.min.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/redactor-osticket.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/redactor-plugins.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>scp/js/jquery.translatable.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>scp/js/jquery.dropdown.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>scp/js/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>scp/js/jb.overflow.menu.js"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo ROOT_PATH; ?>scp/css/tooltip.css">
    <script type="text/javascript">
        getConfig().resolve(<?php
        include INCLUDE_DIR . 'ajax.config.php';
        $api = new ConfigAjaxAPI();
        print $api->scp(false);
        ?>);
    </script>
    <?php
    if (
        $thisstaff
        && ($lang = $thisstaff->getLanguage())
        && 0 !== strcasecmp($lang, 'en_US')
    ) { ?>
        <script type="text/javascript" src="ajax.php/i18n/<?php
        echo $thisstaff->getLanguage(); ?>/js"></script>
    <?php } ?>
    </body>

    </html>
<?php } # endif X_PJAX ?>