<?php

$sectionid = get_sub_field('section_id');
$bgcolor = get_sub_field('background_color');
$bgimg = get_sub_field('background_image');
$bgpos = get_sub_field('background_position');
$paddingtop = get_sub_field('padding_top');
$paddingbottom = get_sub_field('padding_bottom');

?>
<section id="<?php echo $sectionid;?>">

	<div style="background-color: <?php echo $bgcolor ?>; background-image: url(<?php echo $bgimg ?>); background-position: <?php echo $bgpos ?>; background-size: cover; background-repeat: no-repeat;" >
		<div style="padding-top: <?php echo $paddingtop ?>px; padding-bottom: <?php echo $paddingbottom ?>px;">
			<div class="container">

				<?php if( get_sub_field('section_title') ): ?>
					<h2 style="font-size: 46px; padding-bottom: 30px; text-align: center;"><?php the_sub_field('section_title'); ?></h2>
				<?php endif; ?>

				<?php if( get_sub_field('featured_video') ): ?>
					<div class="video" style="text-align: center; padding-bottom: 30px;">
						<?php the_sub_field('featured_video'); ?>
						<p><?php the_sub_field('featured_video_title'); ?></p>
					</div>
				<?php endif; ?>

				<ul class="columns">

					<?php

					// check if the repeater field has rows of data
					if( have_rows('videos') ):

						// loop through the rows of data
						while ( have_rows('videos') ) : the_row();

						?>

						<li class="half">
							<div class="video" style="text-align: center;">
								<?php the_sub_field('iframe_code'); ?>
								<p><?php the_sub_field('video_title'); ?></p>
							</div>
						</li>

						<?php

						endwhile;
						else :
						// no rows found
					endif;
					?>

				</ul> <!-- columns -->

			</div> <!-- container -->
		</div> <!-- padding -->
	</div> <!-- background -->

</section>