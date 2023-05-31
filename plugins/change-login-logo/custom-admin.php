<?php
/*
Plugin Name: thay đổi logo login
Description:  thay đổi logo login
Author:  bundn
Version: 0.1
*/


function my_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo1.png);
            height: 120px;
            width: 120px;
            background-size: cover;
            background-repeat: no-repeat;

        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');

function customize_login_page_register($wp_customize)
{
    $wp_customize->add_section('login_extras_section', array(
        'title'        => 'logo login'
    ));

    $wp_customize->add_setting('login_logo', array(
        'capability'        => 'edit_theme_options',
        'default'            => '',

        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'logo_login',
        array(
            'label'        => 'Upload login Logo',
            'description' => 'Heught: &gt;80px',
            'section'     => 'login_extras_section',
            'settings'    => 'login_logo',
            'priority'    => 1,
        )
    ));
   
}
add_action('customize_register', 'customize_login_page_register');
