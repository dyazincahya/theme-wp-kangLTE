<?php

	function widget_setup()
	{
		$boxcolor = array("primary","success","warning","danger");
		$selected_array = rand(0 ,3);
		register_sidebar(array(
			"name" => "Sidebar Left",
			"id" => "sidebar_left",
			"before_widget" => "<div class='box box-primary'><div class='box-body'>",
			"after_widget" => "</div></div>",
			"before_title" => "<div class='widget-title with-border'><h3 class='box-title'>",
    		"after_title" => "</h3></div>",
		));
	}

	add_action("widgets_init", "widget_setup");

?>