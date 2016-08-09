<div class="col-md-3">
	<!-- Profile Image -->
	<div class="box box-primary">
		<div class="box-body box-profile">
			<form method="get" action="<?php echo home_url( '/' ); ?>">
                <div class="form-group">
                    <input type="search" value="<?php echo get_search_query() ?>" name="s" class="form-control" placeholder="Type keyword here...">
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</button>
			</form>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
	<!-- About Me Box -->
	
			
			<?php dynamic_sidebar("sidebar_left");?>
		
	<!-- </div> -->
	<!-- /.box -->
</div>
<!-- /.col -->