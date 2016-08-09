    <!-- timeline item -->
    <li class="dypost">
        <i class="fa fa-camera bg-purple bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="Image"></i>
        <div class="timeline-item">
            <span class="time top" data-placement="top" data-toggle="tooltip" data-original-title="<?php the_time("d, F Y H:i:s A");?>">
                <i class="fa fa-clock-o"></i> <?php the_time("H:i A");?>
            </span>
            <h3 class="timeline-header">
                <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a> uploaded new photo
            </h3>
            <div class="timeline-body">
                <?php the_content();?>
<!--                 <img src="http://placehold.it/150x100" alt="..." class="margin">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
                <img src="http://placehold.it/150x100" alt="..." class="margin"> -->
            </div>
        </div>
    </li>
    <!-- END timeline item -->