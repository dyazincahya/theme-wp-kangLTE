<?php

	function currentUrl() 
	{
	    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
	    $current = $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	    return $current;
	}

	function countPostTodayGet()
	{
		$today = getdate();
		$query=get_posts('year=' .$today["year"] .'&monthnum=' .$today["mon"] .'&day=' .$today["mday"] );
		return count($query);
	}

	function countPostPerFormat($format, $operator)
	{
		$argumens = array(
  			'tax_query' => array(
    			array(
      				'taxonomy' => 'post_format',
      				'field' => 'slug',
      				'terms' => $format,
				   	'operator' => $operator
    			)
  			),'posts_per_page' => -1
		);

		$total_post = count(query_posts( $argumens ));
		return $total_post;
	}

	function filterPostPerFormat($format = array(), $operator)
	{
		$argumens = array('tax_query' => array(
			array(
			   	'taxonomy' => 'post_format',
			   	'field' => 'slug',
			   	'terms' => $format,
			   	'operator' => $operator,
			),
		), 'posts_per_page' => 3 );					

		return query_posts( $argumens );
	}

	function cutText($string = "", $leng = 15){
		if($string != ""){
			$sting_leng = strlen($string);
			if($sting_leng <= $leng)
			{
				$cut = strtolower($string);
				echo $cut;
				return $cut;
			}
			else
			{
				$cut = strtolower(substr($string, 0, $leng)."...");
				echo $cut;
				return $cut;
			}
		}else{
			$cut = "no string";
			echo $cut;
			return $cut;
		}
	}

	function countPostToday(){
		$today = getdate();
		$query=get_posts('year=' .$today["year"] .'&monthnum=' .$today["mon"] .'&day=' .$today["mday"] );
		$ret = count($query);

		echo $ret;
		return $ret;
	}

	function moDate($param, $new_format = "d, F Y")
    {
         $d=date_create($param);
         $new_date = date_format($d, $new_format);
         return $new_date;
    }

    function hasChild($stack, $id) {
		foreach($stack as $row) {
			if ($row->comment_parent == $id) {
				return true;
			}
		}
		return false;
	}

	function buildTree($stack, $pid, &$nodes) {
		foreach($stack as $row) {
			if ($row->comment_parent == $pid) {
				$node = '
					<div class="direct-chat-messages">
                        <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">'.$row->comment_author.' (replies)</span>
                                <span class="direct-chat-timestamp pull-right">'.moDate($row->comment_date, "d M y H:i A").'</span>
                            </div>
                            <img data-name="'.$row->comment_author.'" class="dy-initial direct-chat-img"/>
                            <div class="direct-chat-text">
                                '.$row->comment_content.'
                            </div>

                        </div>
                    </div>
				';
				
				if (hasChild($stack, $row->comment_ID) == true) {
					buildTree($stack, $row->comment_ID, $row->comment_parent);
				} else {
					$node = '
						<div class="direct-chat-messages replies">
	                        <div class="direct-chat-msg">
	                            <div class="direct-chat-info clearfix">
	                                <span class="direct-chat-name pull-left">'.$row->comment_author.' (replies)</span>
	                                <span class="direct-chat-timestamp pull-right">'.moDate($row->comment_date, "d M y H:i A").'</span>
	                            </div>
	                            <img data-name="'.$row->comment_author.'" class="dy-initial direct-chat-img"/>
	                            <div class="direct-chat-text">
	                                '.$row->comment_content.'
	                            </div>

	                        </div>
	                    </div>
					';
				}
				$nodes[] = $node;
			}
		}
		return $nodes;
	}



	// function hasChild($stack, $id) {
	// 	foreach($stack as $row) {
	// 		if ($row['menu_item_parent'] == $id) {
	// 			return true;
	// 		}
	// 	}
	// 	return false;
	// }

	// function buildTree($theme_location) {
	// 	if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
	//         $menu = get_term( $locations[$theme_location], 'nav_menu' );
	//         $menu_items = wp_get_nav_menu_items($menu->term_id);
	//     	// return $menu_items;
	//     }
	//     $pid = 0;
	//     $node = '';
	// 	foreach($menu_items as $row) {
	// 		if ($row['menu_item_parent'] == $pid) {
	// 			// if(!empty($row['tnbc_nbc_name'])){ $nbc_name = $row['tnbc_nbc_name']; }else{ $nbc_name = $row['tnbc_nbc_no']; }
	// 			$node .= '<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a>';
				
	// 			if ($this->hasChild($stack, $row['ID']) == true) {
	// 				$this->buildTree($stack, $row['tnbc_nbc_id'], $node['children']);
	// 			} else {
	// 				unset($node['children']);
	// 				unset($node['expanded']);
	// 				// $node['expanded'] = FALSE;
	// 				$node['leaf'] = TRUE;
	// 			}

	// 			$node .= '</li>';
	// 			$nodes[] = $node;
	// 		}
	// 	}
	// }

	// function get_data_grid(){
	// 	$params = array(
	// 		'table' => 'trx_nbwo_boq_category',
	// 		'where' => array(),
	// 		'order_by' => array(
	// 			'field' => 'tnbc_nbc_order',
	// 			'sort' => 'ASC'
	// 		)
	// 	);
	// 	$res = $this->get_db->get_data($params)->result_array();
	// 	$nodes = [];
	// 	$this->buildTree($res, 0, $nodes);
	// 	print(json_encode($nodes));
	// }

	function arrayToAttribut()
	{
		
	}

?>