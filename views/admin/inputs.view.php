<? Nos\I18n::current_dictionary(array('lib_disqus::default', 'nos::common')); ?>
<label for="<?= $shortname_id = uniqid('shortname_') ?>">Shortname Disqus (<?= $lien ? $lien : __('retrouvez le dans Disqus') ?>)</label>
<input id="<?= $shortname_id ?>" type="text" value="<?= isset($config['disqus_shortname']) ? $config['disqus_shortname'] : '' ?>" name="disqus_shortname" placeholder="Shortname Disqus">
