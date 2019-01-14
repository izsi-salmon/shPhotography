<?php

function custom_theme_customizer( $wp_customize ){
    
    $wp_customize->add_section('custom_theme_colours', array(
        'title'=> __('Theme Colours', 'shPhotography'),
        'priority' => 20
    ));
    
    $wp_customize->add_setting('theme_colour_setting', array(
        'default' => 'light',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'theme_colour_control',
        array(
            'label'          => __( 'Theme palette', 'shPhotography' ),
            'section'        => 'custom_theme_colours',
            'settings'       => 'theme_colour_setting',
            'type'           => 'radio',
            'choices'        => array(
                'dark'   => __( 'Dark' ),
                'light'  => __( 'Light' )
            )
        )
    ));
    
    
}

add_action('customize_register', 'custom_theme_customizer');

function custom_theme_customizer_styles(){
    ?>
        
        <?php $themeSetting = get_theme_mod('theme_colour_setting', 'light'); ?>
        
        <?php if($themeSetting == 'light'): ?>
        
            <style type="text/css">
                body{
                    background-color: #FFFFFF !important;
                }
                html{
                    color: #000000 !important;
                }
            </style>
            
        <?php else: ?>
        
            <style type="text/css">
                body{
                    background-color: #000000 !important;
                }
                html{
                    color: #FFFFFF !important;
                }
                
                .site-title{
                    background-color: inherit;
                }
                
                #hamburger-container{
                    background-color: inherit;
                }
                
                .open-burger{
                    background-color: rgba(200,200,200,0.5)!important;
                }
                
                .swiper-slide{
                    background-color: inherit;
                }
                
                .testimonal-container{
                    background-color: rgba(200,200,200,0.5)!important;
                }
                
            </style>
        
        <?php endif; ?>

        

    <?php
}
add_action('wp_head', 'custom_theme_customizer_styles');