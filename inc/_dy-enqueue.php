<?php

	function _dyScript()
	{
		// <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

		//load CSS
		wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), '3.3.6' );
		wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/assets/plugins/fontawesome/css/font-awesome.min.css', array(), '4.6' );
		wp_enqueue_style( 'AdminLTE-css', get_template_directory_uri() . '/assets/dist/css/AdminLTE.min.css', array(), '1.0' );
		wp_enqueue_style( 'skin-css', get_template_directory_uri() . '/assets/dist/css/skins/_all-skins.min.css', array(), '1.0' );

		wp_enqueue_style("style", get_stylesheet_uri() );


		//load JS
		wp_enqueue_script( 'JQuery-js', get_template_directory_uri() . '/assets/plugins/jQuery/jQuery-2.2.0.min.js', array(), '2.2.0', true );
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array(), '3.3.6', true );
		wp_enqueue_script( 'SlimScroll-js', get_template_directory_uri() . '/assets/plugins/slimScroll/jquery.slimscroll.min.js', array(), '1.0', true );
		wp_enqueue_script( 'FastClick-js', get_template_directory_uri() . '/assets/plugins/fastclick/fastclick.js', array(), '1.0', true );
		wp_enqueue_script( 'AdminLTE-app-js', get_template_directory_uri() . '/assets/dist/js/app.min.js', array(), '1.0', true );

		wp_enqueue_script( 'initial-js', get_template_directory_uri() . '/assets/plugins/initial.js/dist/initial.min.js', array(), '1.0', true );

		wp_enqueue_script( 'dy-js', get_template_directory_uri() . '/assets/_dy-javascript.js', array(), '1.0', true );
	}

	add_action("wp_enqueue_scripts", "_dyScript");
// ?>