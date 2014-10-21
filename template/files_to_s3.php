<div class="wrap">
    <h2>Перенос файлов в NetAngels S3</h2>
        <span class="description">
        Это локальные файлы которые ранее были загружены вмести с записями, но вы можете загрузить их в облачное хранилище Netangels.
        Пути в записях и страницах будут изменены автоматическии
    </span>
    <?php if ($save) { ?>
        <div id="message" class="updated"><p>Данные сохранены.</p></div>
    <?php } ?>
    <script>
        function setProcess(s) {
            jQuery('#process').html(s);
        }
        function netangelss3_send_file(fl, callbk) {
            var move = 0;
            if (jQuery('#move_to_cloud').is(':checked')) move = 1;
            setProcess('Обрабатываю: ' + fl);
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
                    if (jQuery('#the-list input.file:checked').length == 0
                    {
                        setProcess('Завершено.');
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
                             value="Отправить в облако"> &nbsp; Переносить в облако <input id="move_to_cloud"
                                                                                           type="checkbox"></p>

    <div id="process"></div>
    <br/>
    <table class="wp-list-table widefat fixed pages">
        <thead>
        <tr>
            <th scope="col" id="cb" class="manage-column column-cb check-column" style="">
                <label class="screen-reader-text" for="cb-select-all-1">Выделить все</label><input id="cb-select-all-1"
                                                                                                   type="checkbox">
            </th>
            <th scope="col" id="title" class="manage-column column-title sortable desc" style="">
                <span>Файл</span>
            </th>
            <th scope="col" id="date" class="manage-column column-date sortable asc" style="">
                <span></span>
            </th>
        </tr>
        </thead>
        <tbody id="the-list">
        <?php foreach ($files as $file) { ?>
            <tr id="" class="type-page status-draft hentry alternate iedit author-self level-0"
                data-file="<?php echo $file; ?>">
                <th scope="row" class="check-column">
                    <label class="screen-reader-text" for="cb-select-63">Выбрать</label>
                    <input id="cb-select-63" class="file" type="checkbox" name="post[]" value="<?php echo $file; ?>">

                    <div class="locked-indicator"></div>
                </th>
                <td class="post-title page-title column-title">
                    <strong><span class="post-state"><?php echo $file; ?></span></strong>
                </td>
                <td class="post-title page-title column-title">
                    <strong>
                        <span class="post-state">
                            <?php echo netangelss3_fine_size(filesize($file)); ?>
                        </span>
                    </strong>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary send_to_cloud"
                             value="Отправить в облако"></p>