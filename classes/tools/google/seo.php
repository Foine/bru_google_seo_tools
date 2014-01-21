<?php

namespace Bru\Google\Seo\Tools;

class Tools_Google_Seo
{
    /**
     * Returns the domain of the context send in argument or of the current context without any subdomain
     *
     * @return String
     */
    public static function getDomain($context = '') {
        if (empty($context)) $context = \Nos\Nos::main_controller()->getContext();
        $url = \Nos\Tools_Url::context($context);
        $sHttpProtocol = 'http://';
        if (\Str::starts_with($url, $sHttpProtocol)) $url = substr($url, strlen($sHttpProtocol));
        preg_match('#^[\w.]*\.(\w+\.[a-z]{2,6})[\w/._-]*$#',$url,$match);
        $domain = isset($match[1]) ? $match[1] : '';
        return $domain;
    }
}