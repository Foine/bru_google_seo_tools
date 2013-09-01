<?php
return array(
    'name'    => 'Google Analytics Tag',
    'version' => '0.1',
    'icons' => array(
        16 => 'static/apps/google_analytics_tag/images/google_analytics-16.png',
        32 => 'static/apps/google_analytics_tag/images/google_analytics-32.png',
        64 => 'static/apps/google_analytics_tag/images/google_analytics-64.png',
    ),
    'provider' => array(
        'name' => 'Foine',
    ),
    'namespace' => 'Google\Analytics\Tag',
    'permission' => array(
    ),
    'launchers' => array(
        'google_analytics_tag_launcher_configuration' => array(
            'name' => 'Google Analytics Tag Configuration',
            'icon64' => 'static/apps/google_analytics_tag/images/google_analytics-64.png',
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/google_analytics_tag/config',
                )
            ),
        ),
    ),
);
