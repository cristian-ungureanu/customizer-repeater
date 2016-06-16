<?php


function customizer_repeater_customizer_scripts(){
	/*We need jQuery-Selectric to display icons select in customizer*/
	wp_register_script( 'customizer_repeater_selectric', get_template_directory_uri() .'/js/jquery.selectric.min.js', array("jquery"), '1.0.0');

	/*Include our js file. This is where the magic happens*/
	wp_enqueue_script( 'customizer_repeater_customizer_script',  get_template_directory_uri() .'/js/customizer_repeater_actions.js', array("jquery","jquery-ui-draggable","customizer_repeater_selectric"), '1.0.0', true  );
}
add_action(  'customize_controls_enqueue_scripts', 'customizer_repeater_customizer_scripts'  );