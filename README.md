# Customizer Repeater

## What is Customizer Repeater?

Customizer Repeater is a custom control for the WordPress Theme Customizer. It's designed to be super user-friendly not only for your customers but for you too.

## How to install?

To install Customizer repeater copy the folder in the root of your theme and add the following line in functions.php, before you call your customizer.php file.

         require get_template_directory() . '/customizer-repeater/functions.php';
         /**
          * Do not include twice the file below.
          */
         require get_template_directory() . '/inc/customizer.php';

After you did this there's only one step left. Replace 'your-textdomain' textdomain with yours.
That's all

## How to use? (backend-part)

There are eight types of fields that you can add in a box: (`customizer_repeater_image_control`), (`customizer_repeater_icon_control`), (`customizer_repeater_title_control`), (`customizer_repeater_subtitle_control`), (`customizer_repeater_text_control`), (`customizer_repeater_link_control`), (`customizer_repeater_shortcode_control`), (`customizer_repeater_repeater_control`). To choose what your repeater will look, just enable fields in your control's oprions. Here's an example, add the following code in your theme's customizer.php:

          $wp_customize->add_setting( 'customizer_repeater_example', array(
             'sanitize_callback' => 'customizer_repeater_sanitize'
          ));
          $wp_customize->add_control( new Customizer_Repeater( $wp_customize, 'customizer_repeater_example', array(
		'label'   => esc_html__('Example','customizer-repeater'),
		'section' => 'my_section',
		'priority' => 1,
		'customizer_repeater_image_control' => true,
		'customizer_repeater_icon_control' => true,
		'customizer_repeater_title_control' => true,
		'customizer_repeater_subtitle_control' => true,
		'customizer_repeater_text_control' => true,
		'customizer_repeater_link_control' => true,
		'customizer_repeater_shortcode_control' => true,
		'customizer_repeater_repeater_control' => true
	 ) ) );


Customizer Repeater also supports default input. If you want to add default input for your repeater here's how you do it:

         $wp_customize->add_setting( 'customizer_repeater_example', array(
             'sanitize_callback' => 'customizer_repeater_sanitize',
             'default' => json_encode( array(
                /*Repeater's first item*/
                array("image_url" => get_template_directory_uri().'/images/companies/1.png' ,"link" => "#", "id" => "customizer_repeater_56d7ea7f40f56" ), //every item in default string should have an unique id, it helps for translation
                /*Repeater's second item*/
                array("image_url" => get_template_directory_uri().'/images/companies/1.png' ,"link" => "#", "id" => "customizer_repeater_56d7ea7f40f57" ),
                /*Repeater's third item*/
                array("image_url" => get_template_directory_uri().'/images/companies/1.png' ,"link" => "#", "id" => "customizer_repeater_56d7ea7f40f58" ),
                ) )
         ) );


## How to use? (frontend-part)

To get the input from your control just call it in the normal way:

          $customizer_repeater_example = get_theme_mod('customizer_repeater_example', json_encode( array(/*The content from your default parameter or delete this argument if you don't want a default*/)) );
          /*This returns a json so we have to decode it*/
          $customizer_repeater_example_decoded = json_decode($customizer_repeater_example);
          foreach($customizer_repeater_example_decoded as $repeater_item){
              echo $repeater_item->icon_value;
              echo $repeater_item->text;
              echo $repeater_item->link;
              echo $repeater_item->image_url;
              echo $repeater_item->choice;
              echo $repeater_item->title;
              echo $repeater_item->subtitle;
              echo $repeater_item->shortcode;
              /*Social repeater is also a repeater so we need to decode it*/
              $social_repeater = json_decode($repeater_item->social_repeater);
              foreach($social_repeater as $social_repeater){
                   echo $social_repeater->link;
                   echo $social_repeater->icon;
              }
          }

## Contribute

Customizer Repeater is not perfect, but hey, It works! Do you want to make it better? Feel free to fork this and make changes on development branch.
