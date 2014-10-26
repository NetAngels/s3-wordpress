<div class="wrap">
    <h2><?php echo NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_TO; ?></h2>
    <a href="plugins.php?page=netangelss3-options"><?php echo NETANGELSS3_BACK; ?></a><br /><br />
    <?php if (count($files) > 0) { ?>
        <span class="description">
        <?php echo NETANGELSS3_MESSAGES_MANUAL_TO_THIS_LOCAL_FILES; ?>
    </span>
    <script>
        function setProcess(s) {
            jQuery('#process').html(s);
        }
        function netangelss3_send_file(fl, callbk) {
            var move = 0;
            if (jQuery('#move_to_cloud').is(':checked')) move = 1;
            setProcess('<?php echo NETANGELSS3_DOIT; ?>: ' + fl);
            jQuery.post(
                ajaxurl,
                {
                    'action': 'netangelss3_send_file',
                    'file': fl,
                    'move': move
                },
                function (response) {
                    //if callbk != nullcallbk(respons);
                    jQuery('#the-list input.file:checked').each(function (index, element) {
                        if (fl == jQuery(this).val()) {
                            jQuery(this).parent().parent().remove();
                        }
                    });
                    if (jQuery('#the-list input.file:checked').length == 0 )
                    {
                        setProcess('<?php echo NETANGELSS3_ENDED; ?>');
                        return 0;
                    }
                    netangelss3_send_checked_files_to_cloud();
                }
            );
        }

        function netangelss3_send_checked_files_to_cloud() {
            var file = jQuery('#the-list input.file:checked').val()
            if (file === undefined) return false;
            netangelss3_send_file(file);
        }
        jQuery(document).ready(function () {
            jQuery('.send_to_cloud').click(function () {
                netangelss3_send_checked_files_to_cloud()
            });
        });

    </script>
    <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary send_to_cloud"
                             value="<?php echo NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_SEND_TO_CLOUD; ?>"> &nbsp; <?echo NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_DELETE_LOCAL; ?><input id="move_to_cloud"
                                                                                           type="checkbox"></p>

    <div id="process"></div>
    <br/>
    <table class="wp-list-table widefat fixed pages">
        <thead>
        <tr>
            <th scope="col" id="cb" class="manage-column column-cb check-column" style="">
                <label class="screen-reader-text" for="cb-select-all-1"><?php echo NETANGELSS3_SELALL; ?></label><input id="cb-select-all-1"
                                                                                                   type="checkbox">
            </th>
            <th scope="col" id="title" class="manage-column column-title sortable desc" style="">
                <span><?php echo NETANGELSS3_FILE; ?></span>
            </th>
            <th scope="col" id="date" class="manage-column column-date sortable asc" style="">
                <span><?php echo NETANGELSS3_SIZE; ?></span>
            </th>
            <th scope="col" id="date" class="manage-column column-date sortable asc" style="">
                <span><?php echo NETANGELSS3_DESCR; ?></span>
            </th>
        </tr>
        </thead>
        <tbody id="the-list">
        <?php foreach ($files as $file) { ?>
            <tr id="" class="type-page status-draft hentry alternate iedit author-self level-0"
                data-file="<?php echo $file; ?>" data-filesize="<?php echo netangelss3_filesize($file); ?>">
                <th scope="row" class="check-column">
                    <label class="screen-reader-text" for="cb-select-63"><?php  echo NETANGELSS3_SEL;?></label>
                    <input id="cb-select-63" class="file" type="checkbox" name="post[]" value="<?php echo $file; ?>">

                    <div class="locked-indicator"></div>
                </th>
                <td class="post-title page-title column-title">
                    <strong><span class="post-state"><?php echo $file; ?></span></strong>
                </td>
                <td class="post-title page-title column-title">
                    <strong>
                        <span class="post-state">
                            <?php echo netangelss3_fine_size(netangelss3_filesize($file)); ?>
                        </span>
                    </strong>
                </td>
                <td class="post-title page-title column-title">
                    <strong>
                        <span class="post-state">
                            <small><?php echo netangelss3_fileDesc($file); ?></small>
                        </span>
                    </strong>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary send_to_cloud"
                             value="<?php echo NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_SEND_TO_CLOUD; ?>"></p>
    <?php } else { ?>
    <span class="description">
        <?php echo NETANGELSS3_MESSAGES_NO_FILES_TO_UPLOAD_TO_CLOUD; ?>
    </span>
<?php } ?>