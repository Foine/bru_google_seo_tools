<?
Event::register_function('front.display', function(&$html)
{
    //Rechercher la config du context. Si elle existe on envoie ce qu'il faut.
    $context = \Nos\Nos::main_controller()->getContext();
    $config = Bru\Google\Seo\Tools\Controller_Admin_Config::getOptions();
    $config = $config[$context];
    $full_script = '';
    if ($config['full_script'] != '') {
        if (\Str::starts_with($config['full_script'], '<script')) {
            $full_script = $config['full_script'];
        } else {
            $full_script =  '<script type="text/javascript">'.$config['full_script'].'</script>';
        }
    } else if ($config['google_analytics_tag'] != '') {
        $full_script = \View::forge('bru_google_seo_tools::js_tag', array('tag' => $config['google_analytics_tag']));
    }

    if ($full_script === '') return false;

    //No script if it's a preview
    if (\Nos\Nos::main_controller()->isPreview()) $full_script = '<!--'.$full_script.'-->';

    preg_match("/<body[^>]*>/", $html, $matches);
    if ($matches[0]) {
        $html = str_replace($matches[0], $matches[0]." \n".$full_script."\n", $html);
    }
});
Event::register('front.pageFound', function($params)
{
    //Rechercher la config du context. Si elle existe on envoie ce qu'il faut.
    $context = \Nos\Nos::main_controller()->getContext();
    $config = Bru\Google\Seo\Tools\Controller_Admin_Config::getOptions();
    $config = $config[$context];
    if (isset($config['google_site_verification']) && !empty($config['google_site_verification'])) {
        $meta_tag = '<meta name="google-site-verification" content="'.$config['google_site_verification'].'" />';
        \Nos\Nos::main_controller()->addMeta($meta_tag);
    }
});
