<?php

$bgcolor = get_sub_field('background_color');
$paddingtop = get_sub_field('padding_top');
$paddingbottom = get_sub_field('padding_bottom');

?>
<section id="social" class="social-media-section">

	<div style="background-color: <?php echo $bgcolor ?>;" >
		<div style="padding-top: <?php echo $paddingtop ?>px; padding-bottom: <?php echo $paddingbottom ?>px;">
				<a href="<?php the_sub_field('facebook_url'); ?>" target="_blank"><i class="fa fa-facebook-official fa-fw"></i></a><a href="<?php the_sub_field('twitter_url'); ?>" target="_blank"><i class="fa fa-twitter fa-fw"></i></a><a href="<?php the_sub_field('soundcloud_url'); ?>" target="_blank"><i class="fa fa-soundcloud fa-fw"></i></a><a href="<?php the_sub_field('youtube_url'); ?>" target="_blank"><i class="fa fa-youtube fa-fw"></i></a><a href="<?php the_sub_field('instagram_url'); ?>" target="_blank"><i class="fa fa-instagram fa-fw"></i></a><a href="<?php the_sub_field('spotify_url'); ?>" target="_blank"><i class="fa fa-spotify fa-fw"></i></a><a href="<?php the_sub_field('itunes_url'); ?>" target="_blank"><i class="fa fa-apple fa-fw"></i></a>
		</div>
	</div>

</section>