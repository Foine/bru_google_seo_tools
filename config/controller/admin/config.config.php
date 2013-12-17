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
                                    ),
                                ),
                            ),
                        ),
                    ),
                    2 => array(
                        'col_number' => 6,
                        'view' => 'nos::form/expander',
                        'params' => array(
                            'title'   => __('Webmaster tools'),
                            'options' => array(
                                'allowExpand' => false,
                            ),
                            'content' => array(
                                'view' => 'nos::form/fields',
                                'params' => array(
                                    'fields' => array(
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
        'google_site_verification' => array(
            'label' => __('Code de vérification du site'),
            'form' => array(
                'type' => 'text',
            ),
        ),
    ),
);