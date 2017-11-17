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

				<div class="press-grid">
					<ul>

					<?php

					// check if the repeater field has rows of data
					if( have_rows('press') ):

						// loop through the rows of data
						while ( have_rows('press') ) : the_row();

						?>

						<li class="article__item">
							<a href="<?php the_sub_field('press_url'); ?>" target="_blank"><img src="<?php the_sub_field('press_image'); ?>" alt="<?php echo $image['alt']; ?>">
							<p style="text-align: center;"><strong><?php the_sub_field('press_title'); ?></strong></p></a>
						</li>

						<?php

						endwhile;
						else :
						// no rows found
					endif;
					?>

					</ul>
				</div> <!-- press-grid -->

			</div> <!-- container -->
		</div> <!-- padding -->
	</div> <!-- background -->

</section>