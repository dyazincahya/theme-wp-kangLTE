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
				          	<small>Loream ipsume siatek mololoaiho</small>
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
                                <li class="active"><a href="#timeline" data-toggle="tab">Being read right now</a></li>
                  						</ul>
                  						<div class="tab-content">
                                <div class="active tab-pane" id="timeline">
                                  <!-- The timeline -->
                                  <ul class="timeline timeline-inverse">
                                    <?php 
                                      if( have_posts() )
                                      {
                                    ?>
                                        <li class="post-nav-link right" data-placement="right" data-toggle="tooltip" data-original-title="Previous post">
                                          <?php 
                                            $prevPost = get_previous_post(true);
                                            if($prevPost) {
                                              $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(100,100) );
                                              previous_post_link('%link','<i class="fa fa-arrow-up bg-gray"></i>', TRUE); 
                                            }
                                          ?>
                                        </li><br>
                                      <?php
                                        while( have_posts() )
                                        { 
                                          the_post();
                                          $all = get_template_part('template/_dy-single');
                                          echo $all;
                                        }
                                      ?>
                                        <li class="post-nav-link right" data-placement="right" data-toggle="tooltip" data-original-title="Next post">
                                          <?php 
                                            $nextPost = get_next_post(true);
                                            if($nextPost) {
                                              $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(100,100) ); 
                                              next_post_link('%link','<i class="fa fa-arrow-down bg-gray"></i>', TRUE); 
                                            } 
                                          ?>
                                          
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