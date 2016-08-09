    <!-- timeline item -->
    <li class="dypost">
        <i class="fa fa-file-text-o fa-rotate-180 bg-yellow bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="Aside"></i>
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
                    <li>
                        <a class="btn btn-warning btn-flat btn-xs" data-toggle="modal" data-target="#quickview-<?php the_ID(); ?>">
                            Quick View
                        </a>
                    </li>
                    <li class="pull-right"><?php sharePost("facebook", get_the_permalink()); ?></li>
                    <li class="pull-right"><?php sharePost("gplus", get_the_permalink()); ?></li>
                    <li class="pull-right"><?php sharePost("linkedin", get_the_permalink()); ?></li>
                    <li class="pull-right"><?php sharePost("twitter", get_the_permalink()); ?></li>
                    
                </ul>
            </div>
        </div>
    </li>
    <!-- END timeline item -->

    <!-- Modal -->
    <div class="modal fade" id="quickview-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-search"></i> Quick View <code><?php the_title();?></code></h4>
                </div>
                <div class="modal-body">
                    <?php the_content();?>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                    <a class="btn btn-primary" href="<?php the_permalink();?>">Open Page</a>
                </div>
            </div>
        </div>
    </div>