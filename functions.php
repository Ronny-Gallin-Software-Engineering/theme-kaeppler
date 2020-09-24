<?php
function zpkaeppler_customize_register($wp_customize) {
    
    $wp_customize->add_section('zpkaeppler_colour_scheme', array(
        'title' => 'Colour Scheme',
        'priority' => 30,

    ));

    $wp_customize->add_setting('zpkaeppler_background_colour', array(
        'default' => '#000000',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zpkaeppler_background_colour_control', array(
        'label' => 'Background Colour',
        'section' => 'zpkaeppler_colour_scheme',
        'settings' => 'zpkaeppler_background_colour'
    )));

    $wp_customize->add_setting('zpkaeppler_primary_colour', array(
        'default' => '#14B2CD',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zpkaeppler_primary_colour_control', array(
        'label' => 'Primary Colour',
        'section' => 'zpkaeppler_colour_scheme',
        'settings' => 'zpkaeppler_primary_colour'
    )));
}

function zpkaeppler_customize_css() { ?>
    <style type="text/css">
        :root {
            --background-colour: <?php echo get_theme_mod('zpkaeppler_background_colour');?>;
            --primary-colour: <?php echo get_theme_mod('zpkaeppler_primary_colour');?>;
        }


    </style>
<?php }

function load_styles() {
    wp_register_style( 'master_stylesheet', get_template_directory_uri() . '/styles/master.css', array(), false, 'all');
    wp_enqueue_style( 'master_stylesheet');
}

add_action('customize_register', 'zpkaeppler_customize_register');
add_action( 'wp_head', 'zpkaeppler_customize_css');
add_action( 'wp_enqueue_scripts', 'load_styles');

?>
