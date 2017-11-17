<?php

$bgcolor = get_sub_field('background_color');
$paddingtop = get_sub_field('padding_top');
$paddingbottom = get_sub_field('padding_bottom');

?>
<section id="newsletter">

	<div style="background-color: <?php echo $bgcolor ?>;" >
		<div style="padding-top: <?php echo $paddingtop ?>px; padding-bottom: <?php echo $paddingbottom ?>px;">
			<div class="container newsletter">
				<p><?php the_sub_field('newsletter_text'); ?></p>
				<?php echo do_shortcode('[contact-form-7 id="16" title="Contact form 1"]');  ?>
			</div>
		</div>
	</div>

</section>