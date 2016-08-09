<?php

	function post_all()
	{
		if( have_posts() )
		{
			while( have_posts() )
			{ 
				the_post();
 				$all = get_template_part('format/_dy-content', get_post_format());
				echo $all;
			}
			the_posts_pagination( array(
				'prev_text' => __( 'Back', 'textdomain' ),
				'next_text' => __( 'Next', 'textdomain' ),
				'screen_reader_text' => __("")
			) );
		} 
		else 
		{ 
			$all = "<div class='not-found'>Not Found</div>";
			echo $all;
		}
		return $all;
	}

	function post_standard()
	{
		filterPostPerFormat(array(
		   	'post-format-aside',
	   		'post-format-gallery',
	   		'post-format-link',
	   		'post-format-image',
	   		'post-format-quote',
	   		'post-format-status',
	   		'post-format-video',
	   		'post-format-audio',
	   		'post-format-chat'
	   	), "NOT IN");
		if( have_posts() )
		{
			while( have_posts() )
			{ 
				the_post();
 				$standard = get_template_part('format/_dy-content', get_post_format());
				echo $standard;
			}
		} 
		else 
		{ 
			$standard = "<div class='not-found'>Not Found</div>";
			echo $standard;
		}
		return $standard;
	}

	function post_aside()
	{
		filterPostPerFormat(array('post-format-aside'), "IN");
		if( have_posts() )
		{
			while( have_posts() )
			{ 
				the_post();
 				$aside = get_template_part('format/_dy-content', get_post_format());
				echo $aside;
			}
		} 
		else 
		{ 
			$aside = "<div class='not-found'>Not Found</div>";
			echo $aside;
		}
		return $aside;
	}

	function post_link()
	{
		filterPostPerFormat(array('post-format-link'), "IN");
		if( have_posts() )
		{
			while( have_posts() )
			{ 
				the_post();
 				$link = get_template_part('format/_dy-content', get_post_format());
				echo $link;
			}
		} 
		else 
		{ 
			$link = "<div class='not-found'>Not Found</div>";
			echo $link;
		}
		return $link;
	}

	function post_quote()
	{
		filterPostPerFormat(array('post-format-quote'), "IN");
		if( have_posts() )
		{
			while( have_posts() )
			{ 
				the_post();
 				$quote = get_template_part('format/_dy-content', get_post_format());
				echo $quote;
			}
		}
		else 
		{ 
			$quote = "<div class='not-found'>Not Found</div>";
			echo $quote;
		}
		return $quote;
	}

	function shareTo($social_media, $url_post = "http://www.kang-cahya.com/", $target = "")
	{
		switch ($social_media) {
			case "facebook":
				$link = " <a href='https://www.facebook.com/sharer/sharer.php?u=".$url_post."' target='".$target."'><i class='fa fa-facebook'></i></a> ";
				echo $link;
				return $link;
				break;
			case "google_plus":
				$link = " <a href='https://plus.google.com/share?url=".$url_post."' target='".$target."'><i class='fa fa-google-plus'></i></a> ";
				echo $link;
				return $link;
				break;
			case "linkedin":
				$link = " <a href='https://www.linkedin.com/shareArticle?mini=true&url=".$url_post."&summary=' target='".$target."'><i class='fa fa-linkedin'></i></a> ";
				echo $link;
				return $link;
				break;
			case "twitter":
				$link = " <a href='http://twitter.com/share?url=".$url_post."' target='".$target."'><i class='fa fa-twitter'></i></a> ";
				echo $link;
				return $link;
				break;
			default:
				$link = " <a href='https://www.facebook.com/sharer/sharer.php?u=http://www.kang-cahya.com/' target='".$target."'><i class='fa fa-facebook'></i></a> ";
				echo $link;
				return $link;
		}
	}

?>