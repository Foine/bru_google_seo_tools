<?
Event::register_function('front.display', function(&$html)
{
    //Search the context's config. If there is not : do nothing
    $config = Bru\Google\Seo\Tools\Controller_Admin_Config::getOptions();
    $config = \Arr::get($config, \Nos\Nos::main_controller()->getContext());
    if (empty($config)) {
        return false;
    }

    $full_script = '';
    if ($config['full_script'] != '') {
        if (\Str::starts_with($config['full_script'], '<script')) {
            $full_script = $config['full_script'];
        } else {
            $full_script =  '<script type="text/javascript">'.$config['full_script'].'</script>';
        }
    } else {
        $tag = \Arr::get($config, 'google_analytics_tag');
        if (empty($tag)) return false;

        if (\Arr::get($config, 'use_universal_analytics')) {
            $view = 'bru_google_seo_tools::js_tag_universal_analitycs';
            $datas = array(
                'tag' => $tag,
                'domain' => \Bru\Google\Seo\Tools\Tools_Google_Seo::getDomain(\Nos\Nos::main_controller()->getContext()),
            );
        } else {
            $view = 'bru_google_seo_tools::js_tag';
            $datas = array(
                'tag' => $tag,
            );
        }
        $full_script = \View::forge($view, $datas);
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
    if (!isset($config[$context])) {
        return false;
    }
    $config = $config[$context];
    if (isset($config['google_site_verification']) && !empty($config['google_site_verification'])) {
        $meta_tag = '<meta name="google-site-verification" content="'.$config['google_site_verification'].'" />';
        \Nos\Nos::main_controller()->addMeta($meta_tag);
    }
});
