<!DOCTYPE html> 
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, width=device-width" name="viewport">
	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title>
		<?php
			if (is_single() || is_page()) {
				wp_title('',true); 
			} else { 
				bloginfo('description'); 
			} 
		?> — <?php bloginfo('name');?>
	</title>
	<?php wp_head();?>	
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

  		<header class="main-header">
    		<nav class="navbar navbar-static-top">
      			<div class="container">
        			<div class="navbar-header">
          				<a href="<?php echo site_url('/');?>" class="navbar-brand"><?php bloginfo('name');?></a>
          				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            				<i class="fa fa-bars"></i>
          				</button>
        			</div>

			        <!-- Collect the nav links, forms, and other content for toggling -->
			        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          				<!-- <ul class="nav navbar-nav"> -->
          					<?php 
          						create_bootstrap_menu("main_menu")
          					?>
        			</div>
			        <!-- /.navbar-collapse -->

			        <!-- Navbar Right Menu -->
			        <div class="navbar-custom-menu">
          				<ul class="nav navbar-nav">
				            <!-- Notifications Menu -->
				            <li class="dropdown notifications-menu">
	              				<!-- Menu toggle button -->
	              				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                				<i class="fa fa-bell-o"></i>
	                				<span class="label label-danger"><?php countPostToday(); ?></span>
	              				</a>
	              				<ul class="dropdown-menu">
	                				<li class="header">You have <?php countPostToday(); ?> notifications</li>
	                				<li>
	                  					<!-- Inner Menu: contains the notifications -->
	                  					<ul class="menu">
	                  						<?php
												$today = getdate();
												$args = array(
													'date_query' => array(
														array(
															'year'  => $today['year'],
															'month' => $today['mon'],
															'day'   => $today['mday'],
														),
													),
													'posts_per_page' => limit_show_post_today()
												);
												$query = new WP_Query($args);
												if( $query->have_posts() ){
													while( $query->have_posts() ){ $query->the_post();
											?>
												<li><!-- start notification -->
			                      					<a href="<?php the_permalink();?>">
			                        					<?php 
			                        						echo postFormatIcon(get_post_format( get_the_ID() ))." ";
			                        					 	cutText(get_the_title(), 35);
			                        					?>
			                        					<small><?php 
																// the_time("H:i:s A");
																// echo " . By,";
																// the_author();
															?></small>
			                      					</a>
			                    				</li>
											<?php
													}
												} else { echo "<div align='center'><i class='ion-android-folder'></i> Not found!</div>"; }
												
												// if(countPostTodayGet() > limit_show_post_today()){
												// 	echo '
												// 		<a data-toggle="modal" href="#post-today" class="list-group-item">
												// 		  <small>See all post today</small>
												// 		</a>
												// 	';
												// }
											?>
		                    				<!-- end notification -->
		                  				</ul>
	                				</li>
	              				</ul>
	            			</li>
          				</ul>
        			</div>
        			<!-- /.navbar-custom-menu -->
      			</div>
      			<!-- /.container-fluid -->
    		</nav>
  		</header>
 	
