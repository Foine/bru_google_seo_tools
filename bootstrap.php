<?
Event::register('front.display', function($params)
{
    //Rechercher la config du context. Si elle existe on envoie ce qu'il faut.
    $context = \Nos\Nos::main_controller()->getContext();
    $config = Bru\Google\Analytics\Controller_Admin_Config::getOptions();
    if ($config[$context]['full_script'] != '') {
        if (\Str::begin_with($config[$context]['full_script'], '<script type="text/javascript">')) {
            \Nos\Nos::main_controller()->addMeta($config[$context]['full_script']);
        } else {
            \Nos\Nos::main_controller()->addJavascriptInline($config[$context]['full_script']);
        }
    } else if ($config[$context]['google_analytics_tag'] != '') {
        $js = \View::forge('bru_google_analytics::js_tag', array('tag' => $config[$context]['google_analytics_tag']));
        \Nos\Nos::main_controller()->addJavascriptInline($js);
    }
});
