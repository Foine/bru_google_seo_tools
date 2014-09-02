<?php
$config = array(
    'form_name' => __('Your Google SEO Tools'),
    'tab' => array(
        'label' => 'Google SEO Tools',
    ),
    'layout' => array(
        'lines' => array(
            1 => array(
                'cols' => array(
                    1 => array(
                        'col_number' => 6,
                        'view' => 'nos::form/expander',
                        'params' => array(
                            'title'   => __('Paramètre google analitycs'),
                            'options' => array(
                                'allowExpand' => false,
                            ),
                            'content' => array(
                                'view' => 'nos::form/fields',
                                'params' => array(
                                    'fields' => array(
                                        'google_analytics_tag',
                                        'full_script',
                                        'use_universal_analytics',
                                        'do_not_track_logged_user',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    2 => array(
                        'col_number' => 6,
                        'view' => 'nos::form/expander',
                        'params' => array(
                            'title'   => __('Google webmaster tools'),
                            'options' => array(
                                'allowExpand' => false,
                            ),
                            'content' => array(
                                'view' => 'nos::form/fields',
                                'params' => array(
                                    'fields' => array(
                                        'label_verification',
                                        'google_site_verification_html',
                                        'label_or',
                                        'google_site_verification',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            99 => array(
                'cols' => array(
                    1 => array(
                        'col_number' => 6,
                        'view' => 'nos::form/expander',
                        'params' => array(
                            'title'   => __('Paramètres expert'),
                            'options' => array(
                                'allowExpand' => true,
                                'expanded' => false,
                            ),
                            'content' => array(
                                'view' => 'nos::form/fields',
                                'params' => array(
                                    'fields' => array(
                                        'label_cookie_tracking',
                                        'tracking_cookie_name',
                                        'tracking_cookie_value',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'fields' => array(
        'google_analytics_tag' => array(
            'label' => __('Tag google analytics'),
            'form' => array(
                'type' => 'text',
            ),
        ),
        'full_script' => array(
            'label' => __('Script entier'),
            'form' => array(
                'type' => 'textarea',
            ),
        ),
        'label_verification' => array(
            'label' => '<strong>'.__('Méthode de vérification du site').'</strong>',
            'form' => array(
                'type' => 'text',
                'tag' => 'label',
            ),
        ),
        'google_site_verification' => array(
            'label' => __('Contenu de la balise meta'),
            'form' => array(
                'type' => 'text',
            ),
        ),
        'label_or' => array(
            'label' => '<strong>'.__('OU (utiliser les deux méthodes est inutile)').'</strong>',
            'form' => array(
                'type' => 'text',
                'tag' => 'label',
            ),
        ),
        'google_site_verification_html' => array(
            'label' => __('Nom de la page html de vérification'),
            'form' => array(
                'type' => 'text',
            ),
        ),
        'use_universal_analytics' => array(
            'label' => __('Utiliser Universal analytics'),
            'form' => array(
                'type' => 'checkbox',
                'value' => '1',
                'empty' => '0',
            ),
        ),
        'label_cookie_tracking' => array(
            'label' => '<strong>'.__('Cookie de tracking').'</strong>',
            'form' => array(
                'type' => 'text',
                'tag' => 'label',
            ),
            'expert' => true,
        ),
        'tracking_cookie_name' => array(
            'label' => __('Nom du cookie'),
            'form' => array(
                'type' => 'text',
            ),
            'expert' => true,
        ),
        'tracking_cookie_value' => array(
            'label' => __('Valeur du cookie'),
            'form' => array(
                'type' => 'text',
            ),
            'expert' => true,
        ),
        'do_not_track_logged_user' => array(
            'label' => __('Exclure les administrateurs'),
            'form' => array(
                'type' => 'checkbox',
                'value' => '1',
                'empty' => '0',
            ),
        ),
    ),
);

return $config;