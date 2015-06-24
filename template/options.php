<link rel="stylesheet" id="netangelss3"
      href="<?php echo plugins_url('netangelss3/css/style.css') . '?' . rand(1, 10000); ?>" type="text/css" media="all"/>
<div class="wrap">
    <script>
        var save_button_text = "<?php echo NETANGELSS3_SAVE_LOADING; ?>";
        var save_button_text_loading = "<?php echo NETANGELSS3_SAVE_LOADING; ?>";
        jQuery(document).ready(function() {
            jQuery('#submit').click(function() {
                jQuery('#submit').val(save_button_text_loading).attr('disable','disable');
            });
        });
    </script>
    <h2>Настройки NetAngels S3</h2>
    <?php if ($save) { ?>
        <div id="message" class="updated"><p>Данные сохранены.</p></div>
    <?php } ?>
    <?php if ($errors) { ?>
        <?php $cnt = 0; ?>
        <?php foreach ($errors as $err) { ?>
            <?php $cnt++; ?>
            <div id="err<?php echo $cnt; ?>" class="error below-h2"><p><strong>Ошибка:</strong><?php echo $err; ?></p>
            </div>
        <?php } ?>
    <?php } ?>
    <!--- --- --->
    <?php if ($messages) { ?>
        <?php $cnt = 0; ?>
        <?php foreach ($messages as $msg) { ?>
            <?php $cnt++; ?>
            <div id="err<?php echo $cnt; ?>" class="updated"><p><?php echo $msg; ?></p></div>
        <?php } ?>
    <?php } ?>
    <!--- --- --->
    <form action="" method="post">
        <table class="form-table">
            <tbody>
            <?php /*
        <tr valign="top">
    <th scope="row">Автоматическая загрузка уже загружено</th>
    <td>
        <?php if (DISABLE_WP_CRON) { ?>
    <font color="#ff0000">Невозможно</font>
        <span class="description">WP Cron выключен</span>
        <?php } else { ?>
    <font color="#00FF00">Возможно</font>
        <span class="description"></span>
        <?php } ?>
    </td>
        </tr>
*/
            ?>
            <tr valign="top">
                <th scope="row">
                </th>
                <td>
        <span class="description">
        <a href="<?php echo NETANGELSS3_LINK_GET_KEYS; ?>"
           target="_blank"><?php echo NETANGELSS3_MESSAGES_OPEN_LINK1; ?></a> <?php echo NETANGELSS3_MESSAGES_SHOW_KEYS; ?>
            <a href="<? echo NETANGELSS3_LINK_VIDEO_GET_KEYS; ?>"
               target="_blank"><?php echo NETANGELSS3_MESSAGE_VIDEO_GET_KEYS; ?></a>
        </span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="key_id"><?php echo NETANGELSS3_MESSAGES_KEY_ID; ?>:</label>
                </th>
                <td>
                    <input name="key_id" type="text" id="key_id" value="<?php echo $key_id; ?>" class="regular-text">
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="secret_key"><?php echo NETANGELSS3_MESSAGES_SECRET_KEY; ?>:</label></th>
                <td><input name="secret_key" type="text" id="secret_key" value="<?php echo $secret_key; ?>"
                           class="regular-text"></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="enable"><?php echo NETANGELSS3_MESSAGES_AUTO_MOVE_TO_CLOUD; ?>:</label></th>
                <td>
                    <input name="enable" type="checkbox" id="enable"
                           <?php if ($enable == '1') { ?>checked="checked" <?php } ?>  class="regular-checkbox">
        <span class="description">
        <?php echo NETANGELSS3_MESSAGES_ALL_FILE_WILL_MOVE_TO_CLOUD; ?>
        </span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="enable"><?php echo NETANGELSS3_SEND_ERRORS_TEXT; ?>:</label></th>
                <td>
                    <input name="send_errors" type="checkbox" id="send_errors"
                           <?php if ($send_errors == '1') { ?>checked="checked" <?php } ?>  class="regular-checkbox"><span class="description">
        </span>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="Submit" id="submit" class="button-primary"
                   value="<?php echo NETANGELSS3_SAVE; ?>"/>
        </p>
    </form>
    <?php if ($netangelss3_connection_status == '1') { ?>
        <ol>
            <li>
                <a href="plugins.php?page=netangelss3-options&action=netangelss3-options-files-to-s3"><?php echo NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_TO; ?></a>
            </li>
            <li>
                <a href="plugins.php?page=netangelss3-options&action=netangelss3-options-files-from-s3"><?php echo NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_FROM; ?></a>
            </li>
            <?php if (NETANGELSS3_ENABLE_TESTS) { ?>
                <li>
                    <a href="plugins.php?page=netangelss3-options&action=netangelss3-tests"><?php echo NETANGELSS3_ENABLE_TESTS_STR; ?></a>
                </li>
            <?php } ?>
        </ol>
    <?php } ?>
</div>
