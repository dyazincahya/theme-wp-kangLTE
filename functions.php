<?php

	/** 
	* fungsi dasar  
	**/
	require get_template_directory() . '/inc/_dy-helper.php';

	/** 
	* fungsi conf  
	**/
	require get_template_directory() . '/inc/_dy-helper-conf.php';

	/** 
	* fungsi untuk melakukan setup  
	**/
	require get_template_directory() . '/inc/_dy-setup.php';

	/** 
	* fungsi untuk widget  
	**/
	require get_template_directory() . '/inc/_dy-widget.php';
	
	/** 
	* fungsi untuk keamanan  
	**/
	require get_template_directory() . '/inc/_dy-security.php';
	
	/** 
	* fungsi untuk meload assets  
	**/
	require get_template_directory() . '/inc/_dy-enqueue.php';

	/** 
	* fungsi untuk memanipulasi format  
	**/
	require get_template_directory() . '/inc/_dy-format.php';

	/**
	*
	**/
	require get_template_directory() . '/inc/functions-customize.php';

	
	

	

	// count posts per format-post
	// function count_post_per_format($format, $operator){
	// 	$argumens = array(
 //  			'tax_query' => array(
 //    			array(
 //      				'taxonomy' => 'post_format',
 //      				'field' => 'slug',
 //      				'terms' => $format,
	// 			   	'operator' => $operator
 //    			)
 //  			),'posts_per_page' => -1
	// 	);

	// 	$total_post = count(query_posts( $argumens ));
	// 	return $total_post;
	// }

	// show posts per format-post
	// function filter_post_per_format($format = array(), $operator){
	// 	$argumens = array('tax_query' => array(
	// 		array(
	// 		   	'taxonomy' => 'post_format',
	// 		   	'field' => 'slug',
	// 		   	'terms' => $format,
	// 		   	'operator' => $operator,
	// 		),
	// 	), 'posts_per_page' => 3 );					

	// 	return query_posts( $argumens );
	// }
	
	

	// function url_share($social_media){
	// 	switch ($social_media) {
	// 		case "facebook":
	// 			$link = "https://www.facebook.com/sharer/sharer.php?u=";
	// 			return $link;
	// 			break;
	// 		case "google_plus":
	// 			$link = "https://plus.google.com/share?url=";
	// 			return $link;
	// 			break;
	// 		case "linkedin":
	// 			$link = "https://www.linkedin.com/shareArticle?mini=true&url=";
	// 			return $link;
	// 			break;
	// 		case "twitter":
	// 			$link = "http://twitter.com/share?url=";
	// 			return $link;
	// 			break;
	// 		default:
	// 			echo "Your favorite color is neither red, blue, nor green!";
	// 	}
	// }

	// function share_post_to($social_media, $url_post = "http://www.kang-cahya.com/", $target = ""){
	// 	switch ($social_media) {
	// 		case "facebook":
	// 			$link = " <a href='https://www.facebook.com/sharer/sharer.php?u=".$url_post."' target='".$target."'><i class='fa fa-facebook'></i></a> ";
	// 			echo $link;
	// 			return $link;
	// 			break;
	// 		case "google_plus":
	// 			$link = " <a href='https://plus.google.com/share?url=".$url_post."' target='".$target."'><i class='fa fa-google-plus'></i></a> ";
	// 			echo $link;
	// 			return $link;
	// 			break;
	// 		case "linkedin":
	// 			$link = " <a href='https://www.linkedin.com/shareArticle?mini=true&url=".$url_post."&summary=' target='".$target."'><i class='fa fa-linkedin'></i></a> ";
	// 			echo $link;
	// 			return $link;
	// 			break;
	// 		case "twitter":
	// 			$link = " <a href='http://twitter.com/share?url=".$url_post."' target='".$target."'><i class='fa fa-twitter'></i></a> ";
	// 			echo $link;
	// 			return $link;
	// 			break;
	// 		default:
	// 			$link = " <a href='https://www.facebook.com/sharer/sharer.php?u=http://www.kang-cahya.com/' target='".$target."'><i class='fa fa-facebook'></i></a> ";
	// 			echo $link;
	// 			return $link;
	// 	}
	// }

	// function share_post_to_c($social_media, $url_post = "http://www.kang-cahya.com/", $target = ""){
	// 	switch ($social_media) {
	// 		case "facebook":
	// 			$link = " <a href='https://www.facebook.com/sharer/sharer.php?u=".$url_post."' target='".$target."' class='btn btn-primary'><i class='fa fa-facebook'></i></a> ";
	// 			echo $link;
	// 			return $link;
	// 			break;
	// 		case "google_plus":
	// 			$link = " <a href='https://plus.google.com/share?url=".$url_post."' target='".$target."' class='btn btn-danger'><i class='fa fa-google-plus'></i></a> ";
	// 			echo $link;
	// 			return $link;
	// 			break;
	// 		case "linkedin":
	// 			$link = " <a href='https://www.linkedin.com/shareArticle?mini=true&url=".$url_post."&summary=' target='".$target."' class='btn btn-primary'><i class='fa fa-linkedin'></i></a> ";
	// 			echo $link;
	// 			return $link;
	// 			break;
	// 		case "twitter":
	// 			$link = " <a href='http://twitter.com/share?url=".$url_post."' target='".$target."' class='btn btn-info'><i class='fa fa-twitter'></i></a> ";
	// 			echo $link;
	// 			return $link;
	// 			break;
	// 		default:
	// 			$link = " <a href='https://www.facebook.com/sharer/sharer.php?u=http://www.kang-cahya.com/' target='".$target."' class='btn btn-primary'><i class='fa fa-facebook'></i></a> ";
	// 			echo $link;
	// 			return $link;
	// 	}
	// }
	
	
	
	// function limit_show_post_today(){
	// 	return 2;
	// }
	
	// function post_format_icon($format){
	// 	if($format == "aside"){ return "<i class='md md-receipt'></i>"; }
	// 	elseif($format == "chat"){ return "<i class=''></i>"; }
	// 	elseif($format == "gallery"){ return "<i class=''></i>"; }
	// 	elseif($format == "link"){ return "<i class='md md-link'></i>"; }
	// 	elseif($format == "image"){ return "<i class=''></i>"; }
	// 	elseif($format == "quote"){ return "<i class='md md-format-quote'></i>"; }
	// 	elseif($format == "status"){ return "<i class=''></i>"; }
	// 	elseif($format == "video"){ return "<i class=''></i>"; }
	// 	elseif($format == "audio"){ return "<i class=''></i>";}
	// 	else{ return "<i class='md md-pin-drop'></i>"; }
	// }

	// function post_slider(){
	// 	query_posts('posts_per_page=6');
	// 	if( have_posts() ){
	// 		while( have_posts() ){ the_post();
	// 			$slide = get_template_part('template/gut-content-owlslider');
	// 			echo $slide;
	// 		}
	// 	} else { 
	// 		$slide = "<div class='not-found'>Slide Not Found</div>";
	// 		echo $slide;
	// 	}
	// 	return $slide;
	// }

	// function post_datatable(){ 
	// 	query_posts(array('posts_per_page' => 10000000)); 
	// 	if( have_posts() ){
	//         while( have_posts() ){ the_post();
	// 	    	$rows = "<tr>
	// 	            	<td><a href='".get_the_permalink()."'>".get_the_title()."</a></td>
	// 	                <td>".get_the_author()."</td>
	// 	                <td>".get_the_time('F, d Y H:i:s A')."</td>
	// 	            </tr>";
	// 	        echo $rows;
	// 	    } 
	// 	} else { 
	// 		$rows = "<tr><td>Records Not Found</td></tr>"; 
	// 		echo $rows;
	// 	}
	// 	return $rows;
	// }

	

	// function archive_author(){
	// 	if( have_posts() ){
	// 		while( have_posts() ){ the_post();
	// 			$post_author = get_template_part('template/gut-content-author');
	// 			echo $post_author;
	// 		}
	// 	} else {
	// 		$post_author = "<div class='not-found'>Post Not Found</div>";
	// 		echo $post_author;
	// 	}
	// 	return $post_author;
	// }
	
	// function gut_dir_t($param){
	// 	switch ($param) {
	// 		case "homepage":
	// 			$dir = "template/homepage/";
	// 			return $dir;
	// 			break;
	// 		default:
	// 			$dir = "template/";
	// 			return $dir;
	// 	}
	// }

	// function gut_template(){
	// 	$templ = get_template_part('template/gut-content', get_post_format());
	// 	echo $templ;
	// 	return $templ;
	// }

	// function cut_title_post($data_leng){
	// 	$leng = strlen($data_leng);
	// 	if($leng <= 14){
	// 		$cut = strtolower($data_leng);
	// 		echo $cut;
	// 		return $cut;
	// 	}else{
	// 		$cut = strtolower(substr($data_leng, 0, 14)."...");
	// 		echo $cut;
	// 		return $cut;
	// 	}
	// }

	// function footer_x(){
	// 	$by = "
	// 		<footer class='footer text-right'>
	// 	        2015 © GUT Theme.
	// 	    </footer>
	// 	";

	// 	echo $by;
	// 	return $by;
	// }
?>