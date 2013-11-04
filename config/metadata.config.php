<?php
return array(
    'name'    => 'Google Analytics Tag',
    'version' => '0.1',
    'icons' => array(
        16 => 'static/apps/bru_google_analytics/images/google_analytics-16.png',
        32 => 'static/apps/bru_google_analytics/images/google_analytics-32.png',
        64 => 'static/apps/bru_google_analytics/images/google_analytics-64.png',
    ),
    'provider' => array(
        'name' => 'Foine',
    ),
    'namespace' => 'Bru\Google\Analytics',
    'permission' => array(
    ),
    'requires' => array('lib_options'),
    'launchers' => array(
        'bru_google_analytics_launcher_configuration' => array(
            'name' => 'Google Analytics Tag Configuration',
            'icon64' => 'static/apps/bru_google_analytics/images/google_analytics-64.png',
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/bru_google_analytics/config/form',
                )
            ),
        ),
    ),
);
