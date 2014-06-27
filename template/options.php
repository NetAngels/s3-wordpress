<div class="wrap">
<h2>Настройки NetAngels S3</h2>
<?php if ($save) { ?>
<div id="message" class="updated"><p>Данные сохранены.</p></div>
<?php } ?>
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
*/ ?>
        <tr valign="top">
	<th scope="row"><label for="key_id">Key ID(key_id):</label></th>
	<td>
	    <input name="key_id" type="text" id="key_id" value="<?php echo $key_id; ?>" class="regular-text">
	    <span class="description">
	    <a href="https://panel.netangels.ru/s3/account/" target="_blanck">Откройте эту страницу</a> и нажмите "Показать реквизиты"
	    </span>
	</td>
        </tr>
        <tr valign="top">
	<th scope="row"><label for="secret_key">Secret Key(secret_key):</label></th>
	<td><input name="secret_key" type="text" id="secret_key" value="<?php echo $secret_key; ?>" class="regular-text"></td>
        </tr>
    </tbody></table>
    <p class="submit">
        <input type="submit" name="Submit" class="button-primary" value="Сохранить изменения">
    </p>
</form>
</div>