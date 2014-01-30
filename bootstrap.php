<?
Event::register_function('front.response', function($params)
{
    $html =& $params['content'];

    //Search the context's config. If there is not : do nothing
    $config = Bru\Google\Seo\Tools\Controller_Admin_Config::getOptions();
    $current_context = \Nos\Nos::main_controller()->getPage()->page_context;
    $config = \Arr::get($config, $current_context);
    if (empty($config)) {
        return false;
    }

    //Check if a tracking cookie name is set
    $cookie_name = \Arr::get($config, 'tracking_cookie_name', false);
    if ($cookie_name) {
        if (!\Cookie::get($cookie_name, false) || (\Cookie::get($cookie_name) != \Arr::get($config, 'tracking_cookie_value'))) {
            //The tacking cookie is not set or his value is not good => we do not track the user.
            return false;
        }
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
                'domain' => \Bru\Google\Seo\Tools\Tools_Google_Seo::getDomain($current_context),
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
    $config = Bru\Google\Seo\Tools\Controller_Admin_Config::getOptions();
    $config = \Arr::get($config, \Nos\Nos::main_controller()->getContext());
    if (empty($config)) {
        return false;
    }
    if (isset($config['google_site_verification']) && !empty($config['google_site_verification'])) {
        $meta_tag = '<meta name="google-site-verification" content="'.$config['google_site_verification'].'" />';
        \Nos\Nos::main_controller()->addMeta($meta_tag);
    }
});
Event::register('front.404NotFound', function($params)
{
    $config = Bru\Google\Seo\Tools\Controller_Admin_Config::getOptions();
    $url =& $params['url'];
    $sHtmlExtension = '.html';

    $iSlashPosition = strpos($url, '/');
    if ($iSlashPosition !== false) {
        //There is a '/' in the requested URI : the google verification can't work
        return false;
    }

    foreach ($config as $context => $context_config) {
        // Test if the context url is the same that the base URI. If not, continue;
        if (\Nos\Tools_Url::context($context) != \Uri::base(false)) continue;

        if (empty($context_config)) continue;
        $html_page_name = \Arr::get($context_config, 'google_site_verification_html');
        if (empty($html_page_name)) continue;

        // Remove the '.html' to match with the request URI
        if (\Str::ends_with($html_page_name, $sHtmlExtension)) {
            $html_page_name = \Str::sub($html_page_name, 0, strlen($html_page_name) - strlen($sHtmlExtension));
        }
        // If the google verification page is requested, send the view and exit
        if ($url == $html_page_name) {
            $google_site_verification_code = $html_page_name.$sHtmlExtension;
            \Response::forge(\View::forge('bru_google_seo_tools::google_site_verification', array(
                'google_site_verification_code' => $google_site_verification_code,
            ), false), 200)->send();
            exit();
        }
    }
    return false;
});

