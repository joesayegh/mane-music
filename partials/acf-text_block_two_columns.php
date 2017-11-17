<?php

$widths = get_sub_field('column_width');
// Column classes are defined in susy-settings.scss
$leftwidth = "first-2";
$rightwidth = "second-2";

if($widths == "50-50"):
	$leftwidth = "first-2";
	$rightwidth = "second-2";
elseif($widths == "25-75"):
	$leftwidth = "first-25";
	$rightwidth = "second-75";
elseif($widths == "75-25"):
	$leftwidth = "first-75";
	$rightwidth = "second-25";
elseif($widths == "5-7"):
	$leftwidth = "first-five";
	$rightwidth = "second-seven";
elseif($widths == "7-5"):
	$leftwidth = "first-seven";
	$rightwidth = "second-five";
endif;

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

				<div class="<?php echo $leftwidth;?>">
					<?php the_sub_field('left_column_text'); ?>
				</div>

				<div class="<?php echo $rightwidth;?>">
					<?php the_sub_field('right_column_text'); ?>
				</div>
			</div>
		</div>
	</div>

</section>