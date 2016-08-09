 <?php get_header(); ?>
	<!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->                      
 			<div class="content-wrapper">
    			<div class="">
      				<!-- Content Header (Page header) -->
      				<section class="content-header">
				        <h1>
				          	<i class="fa fa-align-right"></i>
				          	<small><?php bloginfo('description'); ?></small>
				        </h1>
                <?php _dyBreadcrumbs("<i class='fa fa-dashboard'></i> Home");?>
				        <!-- <ol class="breadcrumb">
				          	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				          	<li><a href="#">Layout</a></li>
				          	<li class="active">Top Navigation</li>
				        </ol> -->
      				</section>

      				<!-- Main content -->

        			<div class="content-wrapper">

	          			<!-- Main content -->
	          			<section class="content">

	            			<div class="row">
              					<?php get_sidebar( 'left' ); ?>

              					<div class="col-md-9">
                					<div class="nav-tabs-custom">
                              
                  						<ul class="nav nav-tabs">
                                <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
                    						<li><a href="#activity" data-toggle="tab">Activity</a></li>
                  						</ul>
                  						<div class="tab-content">
                                <div class="active tab-pane" id="timeline">
                                  <!-- The timeline -->
                                  <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <!-- <li class="time-label">
                                      <span class="bg-red">10 Feb. 2014</span>
                                    </li> -->
                                    <!-- <li>
                                      <i class="fa fa-arrow-up bg-gray right" data-placement="right" data-toggle="tooltip" data-original-title="Prev page"></i>
                                    </li> -->
                                    <?php 
                                      if( have_posts() )
                                      {
                                    ?>
                                        <li class="post-nav-link right" data-placement="right" data-toggle="tooltip" data-original-title="Previous page">
                                          <?php posts_nav_link( ' ', '<i class="fa fa-arrow-up bg-gray"></i>', ' ' ); ?>
                                        </li><br>
                                      <?php
                                        while( have_posts() )
                                        { 
                                          the_post();
                                          $all = get_template_part('format/_dy-content', get_post_format());
                                          echo $all;
                                        }
                                      ?>
                                        <li class="post-nav-link right" data-placement="right" data-toggle="tooltip" data-original-title="Next page">
                                          <?php posts_nav_link( ' ', ' ', '<i class="fa fa-arrow-down bg-gray"></i>' ); ?>
                                        </li>
                                    <?php
                                      } 
                                      else 
                                      { 
                                        $all = "<div class='not-found'>Not Found</div>";
                                        echo $all;
                                      }
                                      
                                    ?>
                                  </ul>
                                </div>
                                <!-- /.tab-pane -->
                    						<div class="tab-pane" id="activity">
                                  <?php
                                    $args = array(
                                      'status' => 'approve',
                                      'number' => 8
                                    );
                                    $comments = get_comments($args);
                                    foreach($comments as $comment) :
                                  ?>
                                    <!-- Post -->
                                    <div class="post">
                                      <div class="user-block">
                                        <img data-name="<?php echo get_comment_author( $comment_ID ); ?>" class="dy-initial img-circle img-bordered-sm"/> 
                                            <span class="username">
                                              <a><?php echo get_comment_author( $comment_ID ); ?></a> 
                                              Comment On 
                                              <a href="<?php echo get_permalink($comment->comment_post_ID);?>">
                                                <?php echo get_post($comment->comment_post_ID)->post_title;?>
                                              </a>
                                              <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                                            </span>
                                          <span class="description">
                                            <span right" data-placement="right" data-toggle="tooltip" data-original-title="<?php the_time("d, F Y H:i:s A");?>">
                                              Shared publicly - <?php comment_time('H:i A'); ?>
                                            </span>
                                          </span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                          <?php echo $comment->comment_content;?>
                                      </p>
                                    </div>
                                    <!-- /.post -->
                                  <?php endforeach; ?>
                    					</div>
                    					<!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                          </div>
                          <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </section>
                    <!-- /.content -->
                  </div>
              </div>
              <!-- /.container -->
            </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
<?php get_footer(); ?>