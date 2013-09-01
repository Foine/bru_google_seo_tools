<? Nos\I18n::current_dictionary(array('lib_disqus::default', 'nos::common')); ?>
<h1 class="lib_disqus">
    <?= __('Configuration de disqus') ?>
</h1>
<form class="lib_disqus" id="<?= $form_id = uniqid('lib_disqus_') ?>" action="admin/lib_disqus/config/save" method="post">
    <?= render('nos::form/expander', array(
    'title' => __('Vos identifiants Disqus'),
    'content' => render('lib_disqus::admin/inputs',
        array(
            'config' => $config,
            'lien' => render('lib_disqus::admin/lien_externe',array('label' => __('retrouvez le dans Disqus')), false)
        ), false),
    ), false); ?>
    <input type="submit" value="<?= __('Save') ?>">
</form>
<style>
    .lib_disqus {
        width: 90%;
        margin: 0 auto;
    }
    h1.lib_disqus {
        font-size: 18px;
        margin-top: 7px;
        margin-bottom: 7px;
    }
    #<?= $install_id ?> {
        margin-top: 15px;
    }
</style>
<script language="JAVAScript">
    require(
            [
                'jquery-nos'
            ],
            function($) {
                var $form = $('#<?= $form_id ?>');
                $form.nosFormAjax();
                $form.nosFormUI();
                $form.nosTabs('update', {
                    label: <?= \Format::forge(__('Google Analytics Tag Configuration'))->to_json() ?>,
                    url:  'admin/google_analytics_tag/config',
                    iconUrl: '/static/apps/google_analytics_tag/images/google_analytics-32.png',
                    app: true,
                    iconSize: 32,
                    labelDisplay: false
                });
            }
            );
</script>