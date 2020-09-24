<?php
function zpkaeppler_customize_register($wp_customize) {
    
    $wp_customize->add_setting('zpkaeppler_primary_colour', array(
        'default' => '#000000',
        'transport' => 'refresh'
    ));
}

add_action('customize_register', 'zpkaeppler_customize_register');

?>