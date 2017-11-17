<?php

$bgcolor = get_sub_field('background_color');
$heroimage = get_sub_field('hero_image');

?>

<section id="heroimage" style="background-color: <?php echo $bgcolor ?>;">
	<div class="heroimage">
		<img src="<?php echo $heroimage ?>" alt="<?php echo $image['alt']; ?>" width="1280" height="720">
	</div>
</section>