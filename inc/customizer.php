<?php
function customizer_repeater_register( $wp_customize ) {

	require_once( get_template_directory().'/customizer-repeater/class/customizer-repeater-control.php' );

	$wp_customize->add_setting( 'parallax_one_logos_content', array(

		'default' => json_encode(
			array(
//                array("image_url" => parallax_get_file('/images/companies/1.png') ,"link" => "#", "id" => "parallax_one_56d7ea7f40f56" ),
//                array("image_url" => parallax_get_file('/images/companies/2.png') ,"link" => "#", "id" => "parallax_one_56d7f2cb8a158" ),
//                array("image_url" => parallax_get_file('/images/companies/3.png') ,"link" => "#", "id" => "parallax_one_56d7f2cc8a159" ),
//                array("image_url" => parallax_get_file('/images/companies/4.png') ,"link" => "#", "id" => "parallax_one_56d7f2ce8a15a" ),
//                array("image_url" => parallax_get_file('/images/companies/5.png') ,"link" => "#", "id" => "parallax_one_56d7f2cf8a15b" )
			)
		)
	));
	$wp_customize->add_control( new Customizer_Repeater( $wp_customize, 'parallax_one_logos_content', array(
		'label'   => esc_html__('Add new social icon','parallax-one'),
		'section' => 'oblique_social',
		'priority' => 10,
		'customizer_repeater_image_control' => true,
		'customizer_repeater_icon_control' => true,
		'customizer_repeater_title_control' => true,
		'customizer_repeater_subtitle_control' => true,
		'customizer_repeater_text_control' => true,
		'customizer_repeater_link_control' => true,
		'customizer_repeater_shortcode_control' => true,
		'customizer_repeater_repeater_control' => true
	) ) );

}
add_action( 'customize_register', 'customizer_repeater_register' );