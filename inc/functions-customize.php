<?php
	/**
	* Author : Cahya Dyazin
	* Alias  : Kang
	* Github : http://github.com/dyazincahya		
	**/

	// Breadcrumb :: Implament for AdminLTE Template
	function _dyBreadcrumbs($home_title = 'Homepage', $separator = '&gt;', $breadcrums_class = 'breadcrumb', $breadcrums_id = '') {
	       
	    // Settings
	    // $separator          = '&gt;';
	    // $breadcrums_id      = 'breadcrumb';
	    // $breadcrums_class   = 'breadcrumb';
	    // $home_title         = 'Homepage';
	      
	    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
	    $custom_taxonomy    = 'product_cat';
	       
	    // Get the query & post information
	    global $post,$wp_query;
	       
	    // Do not display on the homepage
	    if ( !is_front_page() ) {
	       
	        // Build the breadcrums
	        echo '<ol id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
	           
	        // Home page
	        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
	        // echo '<li class="separator-home"> ' . $separator . ' </li>';
	           
	        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
	              
	            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
	              
	        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
	              
	            // If post is a custom post type
	            $post_type = get_post_type();
	              
	            // If it is a custom post type display name and link
	            if($post_type != 'post') {
	                  
	                $post_type_object = get_post_type_object($post_type);
	                $post_type_archive = get_post_type_archive_link($post_type);
	              
	                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
	                // echo '<li class="separator"> ' . $separator . ' </li>';
	              
	            }
	              
	            $custom_tax_name = get_queried_object()->name;
	            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
	              
	        } else if ( is_single() ) {
	              
	            // If post is a custom post type
	            $post_type = get_post_type();
	              
	            // If it is a custom post type display name and link
	            if($post_type != 'post') {
	                  
	                $post_type_object = get_post_type_object($post_type);
	                $post_type_archive = get_post_type_archive_link($post_type);
	              
	                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
	                // echo '<li class="separator"> ' . $separator . ' </li>';
	              
	            }
	              
	            // Get post category info
	            $category = get_the_category();
	             
	            if(!empty($category)) {
	              
	                // Get last category post is in
	                $last_category = end(array_values($category));
	                  
	                // Get parent any categories and create array
	                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
	                $cat_parents = explode(',',$get_cat_parents);
	                  
	                // Loop through parent categories and store in variable $cat_display
	                $cat_display = '';
	                foreach($cat_parents as $parents) {
	                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
	                    // $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
	                }
	             
	            }
	              
	            // If it's a custom post type within a custom taxonomy
	            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
	            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
	                   
	                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
	                $cat_id         = $taxonomy_terms[0]->term_id;
	                $cat_nicename   = $taxonomy_terms[0]->slug;
	                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
	                $cat_name       = $taxonomy_terms[0]->name;
	               
	            }
	              
	            // Check if the post is in a category
	            if(!empty($last_category)) {
	                echo $cat_display;
	                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
	                  
	            // Else if post is in a custom taxonomy
	            } else if(!empty($cat_id)) {
	                  
	                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
	                // echo '<li class="separator"> ' . $separator . ' </li>';
	                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
	              
	            } else {
	                  
	                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
	                  
	            }
	              
	        } else if ( is_category() ) {
	               
	            // Category page
	            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
	               
	        } else if ( is_page() ) {
	               
	            // Standard page
	            if( $post->post_parent ){
	                   
	                // If child page, get parents 
	                $anc = get_post_ancestors( $post->ID );
	                   
	                // Get parents in the right order
	                $anc = array_reverse($anc);
	                   
	                // Parent page loop
	                foreach ( $anc as $ancestor ) {
	                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
	                    // $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
	                }
	                   
	                // Display parent pages
	                echo $parents;
	                   
	                // Current page
	                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
	                   
	            } else {
	                   
	                // Just display current page if not parents
	                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
	                   
	            }
	               
	        } else if ( is_tag() ) {
	               
	            // Tag page
	               
	            // Get tag information
	            $term_id        = get_query_var('tag_id');
	            $taxonomy       = 'post_tag';
	            $args           = 'include=' . $term_id;
	            $terms          = get_terms( $taxonomy, $args );
	            $get_term_id    = $terms[0]->term_id;
	            $get_term_slug  = $terms[0]->slug;
	            $get_term_name  = $terms[0]->name;
	               
	            // Display the tag name
	            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
	           
	        } elseif ( is_day() ) {
	               
	            // Day archive
	               
	            // Year link
	            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
	            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
	               
	            // Month link
	            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
	            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
	               
	            // Day display
	            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
	               
	        } else if ( is_month() ) {
	               
	            // Month Archive
	               
	            // Year link
	            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
	            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
	               
	            // Month display
	            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
	               
	        } else if ( is_year() ) {
	               
	            // Display year archive
	            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
	               
	        } else if ( is_author() ) {
	               
	            // Auhor archive
	               
	            // Get the author information
	            global $author;
	            $userdata = get_userdata( $author );
	               
	            // Display author name
	            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
	           
	        } else if ( get_query_var('paged') ) {
	               
	            // Paginated archives
	            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
	               
	        } else if ( is_search() ) {
	           
	            // Search results page
	            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
	           
	        } elseif ( is_404() ) {
	               
	            // 404 page
	            echo '<li>' . 'Error 404' . '</li>';
	        }
	       
	        echo '</ol>';
	           
	    }    
	}

	function sharePost($social_media, $url_post = "http://www.kang-cahya.com/", $target = "_blank"){
		switch ($social_media) {
			case "facebook":
				$link = " <a href='https://www.facebook.com/sharer/sharer.php?u=".$url_post."' target='".$target."' class='btn btn-primary btn-xs'><i class='fa fa-facebook'></i></a> ";
				echo $link;
				return $link;
				break;
			case "gplus":
				$link = " <a href='https://plus.google.com/share?url=".$url_post."' target='".$target."' class='btn btn-danger btn-xs'><i class='fa fa-google-plus'></i></a> ";
				echo $link;
				return $link;
				break;
			case "linkedin":
				$link = " <a href='https://www.linkedin.com/shareArticle?mini=true&url=".$url_post."&summary=' target='".$target."' class='btn btn-primary btn-xs'><i class='fa fa-linkedin'></i></a> ";
				echo $link;
				return $link;
				break;
			case "twitter":
				$link = " <a href='http://twitter.com/share?url=".$url_post."' target='".$target."' class='btn btn-info btn-xs'><i class='fa fa-twitter'></i></a> ";
				echo $link;
				return $link;
				break;
			default:
				$link = " <a href='https://www.facebook.com/sharer/sharer.php?u=http://www.kang-cahya.com/' target='".$target."' class='btn btn-primary btn-xs'><i class='fa fa-facebook'></i></a> ";
				echo $link;
				return $link;
		}
	}

	function postFormatIcon($format){
		if($format == "aside"){ return "<i class='fa fa-file-text-o'></i>"; }
		elseif($format == "chat"){ return "<i class=''></i>"; }
		elseif($format == "gallery"){ return "<i class='fa fa-photo'></i>"; }
		elseif($format == "link"){ return "<i class='fa fa-link'></i>"; }
		elseif($format == "image"){ return "<i class='fa fa-camera'></i>"; }
		elseif($format == "quote"){ return "<i class='fa fa-quote-left'></i>"; }
		elseif($format == "status"){ return "<i class=''></i>"; }
		elseif($format == "video"){ return "<i class=''></i>"; }
		elseif($format == "audio"){ return "<i class=''></i>";}
		else{ return "<i class='fa fa-map-pin'></i>"; }
	}

	function postFormatIconOnly($format){
		if($format == "aside"){ return "fa fa-file-text-o bg-yellow"; }
		elseif($format == "chat"){ return ""; }
		elseif($format == "gallery"){ return "fa fa-photo bg-purple"; }
		elseif($format == "link"){ return "fa fa-link bg-aqua"; }
		elseif($format == "image"){ return "fa fa-camera bg-purple"; }
		elseif($format == "quote"){ return "fa fa-quote-left bg-green"; }
		elseif($format == "status"){ return ""; }
		elseif($format == "video"){ return ""; }
		elseif($format == "audio"){ return "";}
		else{ return "fa fa-map-pin bg-blue"; }
	}

	function limit_show_post_today(){
		return 5;
	}

	function dy_mytheme_comment($comment, $args, $depth) {
	    if ( 'div' === $args['style'] ) {
	        $tag       = 'div';
	        $add_below = 'comment';
	    } else {
	        $tag       = 'li';
	        $add_below = 'div-comment';
	    }
	    ?>
	    <!--div>
            <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">'.$comment->comment_author.' (replies)</span>
                    <span class="direct-chat-timestamp pull-right">'.moDate($comment->comment_date, "d M y H:i A").'</span>
                </div>
                <img data-name="'.$comment->comment_author.'" class="dy-initial direct-chat-img"/>
                <div class="direct-chat-text">
                    '.$comment->comment_content.'
                </div>

            </div>
        </div-->
	    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>" class="direct-chat-messages">
	    <?php if ( 'div' != $args['style'] ) : ?>
	        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	    <?php endif; ?>
	    <div class="comment-author vcard">
	        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	        <?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
	    </div>
	    <?php if ( $comment->comment_approved == '0' ) : ?>
	         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
	          <br />
	    <?php endif; ?>

	    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
	        <?php
	        /* translators: 1: date, 2: time */
	        printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
	        ?>
	    </div>

	    <?php comment_text(); ?>

	    <div class="reply">
	        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	    </div>
	    <?php if ( 'div' != $args['style'] ) : ?>
	    </div>
	    <?php endif; ?>
	<?php
	}
?>