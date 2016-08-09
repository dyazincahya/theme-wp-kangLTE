    <!-- timeline item -->
    <li class="dypost">

        <i class="<?php echo postFormatIconOnly(get_post_format( get_the_ID() )); ?> bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo get_post_format( get_the_ID() );?>"></i>
        <div class="timeline-item">
            <span class="time top" data-placement="top" data-toggle="tooltip" data-original-title="<?php the_time("d, F Y H:i:s A");?>">
                <i class="fa fa-clock-o"></i> <?php the_time("H:i A");?>
            </span>
            <h3 class="timeline-header">
                <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
            </h3>
            <div class="timeline-body">
                <?php the_content();?>
            </div>

            <div class="timeline-footer">
                <ul class="list-inline">
                    <li><?php sharePost("facebook", get_the_permalink()); ?></li>
                    <li><?php sharePost("gplus", get_the_permalink()); ?></li>
                    <li><?php sharePost("linkedin", get_the_permalink()); ?></li>
                    <li><?php sharePost("twitter", get_the_permalink()); ?></li>
                    <li class="pull-right">
                        <a class="link-black text-sm">
                            <i class="fa fa-comments-o margin-r-5"></i> Comments ( 
                                <?php echo wp_count_comments( get_the_ID() )->approved; ?>
                             )
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
    <!-- END timeline item -->

    <li class="dypost">
        <i class="fa fa-user bg-gray bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="Author"></i>
        <div class="timeline-item">
            <div class="timeline-body">
                <div class="row">
                    <div class="col-md-1" align="right">
                        <img data-name="<?php the_author(); ?>" class="dy-initial img-circle img-bordered-sm" style="height:70px;" />
                    </div>
                    <div class="col-md-9">
                        <h4><?php the_author();?></h4>
                        <p><?php the_author_description();?></p>
                    </div>
                </div>
            </div>
        </div>
    </li>

    <li class="dypost">
        <i class="fa fa-sitemap bg-gray bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="Related Post"></i>
        <div class="timeline-item">
            <div class="timeline-body">
                <?php
                    $argumens = array('tax_query' => array(
                            array(
                                'taxonomy' => 'post_format',
                                'field' => 'slug',
                                'terms' => array(
                                    'post-format-aside',
                                    'post-format-gallery',
                                    'post-format-link',
                                    'post-format-image',
                                    'post-format-quote',
                                    'post-format-status',
                                    'post-format-video',
                                    'post-format-audio',
                                    'post-format-chat'
                                ),
                                'operator' => 'NOT IN',
                            ),
                        ), 'posts_per_page' => 5, 'orderby' => 'rand'
                    );
                    $related = new WP_Query( $argumens );
                    if( $related->have_posts() ):
                ?>
                        <ul>
                            <?php while( $related->have_posts() ): $related->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a> . 
                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php the_time('H:i:s A');?>">
                                        <?php the_time('F, d Y');?>
                                    </span>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                <?php
                    endif;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </li>

    <?php
        if ( post_password_required() ){
            return;
        }
        $ttl_comment=wp_count_comments( get_the_ID() )->approved;
        $comment_id = get_comment_ID();
    ?>

    <li class="dypost">
        <i class="fa fa-commenting bg-gray bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="List Comments"></i>
        <div class="timeline-item">
            <div class="timeline-body">
                <?php
                    if($ttl_comment <= 0){ echo "No comment !"; }else{
                ?>
                <ul class="dycommentlist">  
                    <?php
                        wp_list_comments( array(
                            'walker'            => null,
                            'max_depth'         => '',
                            'style'             => 'ul',
                            'callback'          => null,
                            'end-callback'      => null,
                            'type'              => 'all',
                            'reply_text'        => 'Reply',
                            'page'              => '',
                            'per_page'          => 7,
                            'avatar_size'       => 32,
                            'reverse_top_level' => null,
                            'reverse_children'  => '',
                            'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
                            'short_ping'        => false,   // @since 3.6
                            'echo'              => true     // boolean, default is
                        ) );
                    ?> 
                </ul>
                <?php } ?>
            </div>
        </div>
    </li>

    <li class="dypost">
        <i class="fa fa-comment bg-gray bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="Write comment..."></i>
        <div class="timeline-item">
            <div class="timeline-body">
                <!-- <h4 class="text-primary m-0"> -->
                    <?php
                        $args_comment = array(
                            'comment_field' => '<div class="form-group"><label>' . _x( 'Comment', 'noun' ) . '</label><textarea class="wysihtml5 form-control" placeholder="Message body" style="height: 200px" name="comment"></textarea></div>',
                            'fields' => apply_filters( 'comment_form_default_fields', array(
                                'author' => '<div class="form-group"><label>' . __( 'Your Name' ) . '' . ( $req ? ' <span>*</span>' : '' ) . '</label><input id="author" name="author" type="text" placeholder="Name..." class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" "' . $aria_req . ' />' . '</div>',
                                'email'  => '<div class="form-group"><label>' . __( 'Your Email' ) . '' . ( $req ? ' <span>*</span>' : '' ) . '</label><input id="email" name="email" type="text" class="form-control" placeholder="Email..." value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' . '</div>'
                            ) ),
                            'comment_notes_before' => '',
                            'class_submit' => 'btn btn-primary waves-effect waves-light',
                        );
                        comment_form($args_comment); 
                    ?>
                <!-- </h4> -->
            </div>
        </div>
    </li>
    