<?php
return array(
    'layout' => array(
        'lines' => array(
            array(
                'cols' => array(
                    array(
                        'col_number' => 5,
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
    ),
);