<?php if(header_images_exist()): ?>

	<div class="row">		
			<div id="HeaderCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#HeaderCarousel" data-slide-to="0" class="active"></li>
			    <?php foreach($GLOBALS["header_images"] as $key => $value):
			    	if($key != 0):?>
				    	<li data-target="#HeaderCarousel" data-slide-to="<?php echo $key; ?>"></li>
					<?php endif;
				endforeach;
				?>

			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">

			    <div class="item active">
			      <img src="<?php echo htmlspecialchars(get_header_images()[0]->image_url); ?>">
			      	<div class="carousel-caption">
				    	<p class='carousel-title'><?php echo htmlspecialchars(get_header_images()[0]->caption_title); ?></p>
						<p class='carousel-subtitle'><?php echo htmlspecialchars(get_header_images()[0]->caption_subtitle); ?></p>
					</div>
			    </div>

			    <?php foreach($GLOBALS["header_images"] as $key => $value): ?>
			    	<?php if($key != 0):?>
				    	<div class="item">
					      <img src="<?php echo htmlspecialchars($value->image_url); ?>">
					        <div class="carousel-caption">
								<h3><?php echo htmlspecialchars($value->caption_title); ?></h3>
							 	<h5><?php echo htmlspecialchars($value->caption_subtitle); ?></h5>
							</div>
					    </div>
					<?php endif;?>
				<?php endforeach;?>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#HeaderCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#HeaderCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
<?php endif; ?>