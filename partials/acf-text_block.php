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

				<div style="width:100%; max-width:<?php the_sub_field('text_width'); ?>; margin: 0 auto;">
					<?php the_sub_field('text'); ?>
				</div>
			</div>
		</div>
	</div>

</section>