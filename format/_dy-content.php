    <!-- timeline item -->
    <li class="dypost">
        <i class="fa fa-map-pin bg-blue bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="Standard"></i>
        <div class="timeline-item">
            <span class="time top" data-placement="top" data-toggle="tooltip" data-original-title="<?php the_time("d, F Y H:i:s A");?>">
                <i class="fa fa-clock-o"></i> <?php the_time("H:i A");?>
            </span>
            <h3 class="timeline-header">
                <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
            </h3>
            <div class="timeline-body">
                <?php cutText(strip_tags(get_the_content()), 250);?>
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