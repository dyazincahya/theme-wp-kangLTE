<?php

	function _dy_setup()
	{
		register_nav_menus(array(
			'main_menu' => 'Menu Utama',
			'sosmed' => 'Social Media'
		));

		//thumbnail
		add_theme_support("post-thumbnails");
		add_image_size("small_thumb", 214, 214, true);
		add_image_size("big_thumb", 300, 300, true);
		add_image_size("img_thumb", 150, 150, true);

		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote' ) );
	}

	add_action("after_setup_theme","_dy_setup");


	//set length the excerpt
	function get_excerpt_length(){
		return 20;
	}
	add_filter('excerpt_length', 'get_excerpt_length');


	function return_excerpt_text(){
		return '';
	}
	add_filter('excerpt_more', 'return_excerpt_text');

?>