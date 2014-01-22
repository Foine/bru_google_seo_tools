<?php
return array(
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
        )
    ),
);