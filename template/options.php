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
