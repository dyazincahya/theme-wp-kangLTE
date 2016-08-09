    <!-- timeline item -->
    <li class="dypost">
        <i class="fa fa-link bg-aqua bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="Link"></i>
        <div class="timeline-item">
            <span class="time top" data-placement="top" data-toggle="tooltip" data-original-title="<?php the_time("d, F Y H:i:s A");?>">
                <i class="fa fa-clock-o"></i> <?php the_time("H:i A");?>
            </span>
            <h3 class="timeline-header no-border">
                <a href="#modal" title="<?php the_title();?>" data-toggle="modal" data-target="#goto-<?php the_ID(); ?>">
                    <?php the_title();?>
                </a>                            
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
                </ul>
            </div>
        </div>
    </li>
    <!-- END timeline item -->

    <!-- Modal -->
    <div class="modal fade" id="goto-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i> Confirmation</h4>
                </div>
                <div class="modal-body">
                    You will be redirected to <code><?php echo strip_tags(get_the_content());?></code>, are you sure?
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                    <a class="btn btn-primary" href="<?php echo strip_tags(get_the_content());?>">Yes</a>
                    <a class="btn btn-success" href="<?php the_permalink();?>">Open Page</a>
                </div>
            </div>
        </div>
    </div>
    
                    