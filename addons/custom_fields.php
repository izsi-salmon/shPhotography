<?php

// Custom meta boxes

$metaboxes = array(
    'web_ux_section' => array(
        'title' => __('Project Content', 'Breadcrumbs'),
        'applicableto' => 'webstudents',
        'location' => 'normal',
        'priority' => 'high',
        'fields' => array(
            'profile_link' => array(
              'title' => __('Link to Linkedin: ', 'shPhotography'),
              'type' => 'text'
            )
        )
    )
);
