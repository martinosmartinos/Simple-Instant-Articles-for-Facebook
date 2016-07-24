<?php
/**
 * Article template for Facebook Instant Articles.
 */
?>
<!doctype html>
<html lang="en" prefix="op: http://media.facebook.com/op#">
<head>
	<meta property="op:markup_version" content="v1.0">
	<meta property="fb:use_automatic_ad_placement" content="true">
	<title><?php the_title(); ?> - Mongabay</title>
	<link rel="canonical" href="<?php the_permalink(); ?>">
</head>
<body>
	<article>
		<figure class="op-tracker">
			<iframe>
				<script>
					(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
					})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

					ga('create', <?php echo wp_json_encode( $data['ga_profile_id'] ); ?>, 'auto');
					ga('set', 'dimension6', 'FBIA');
					ga('send', 'pageview');
				</script>
			</iframe>
		</figure>
		<?php do_action( 'simple_fb_before_the_cover' ); ?>
		<?php include( apply_filters( 'simple_fb_article_cover_template_file', 'article-cover.php' ) ); ?>
		<?php do_action( 'simple_fb_after_the_cover' ); ?>
		<?php do_action( 'simple_fb_before_the_content' ); ?>
		<?php
		$mog_count = 0;
			for ($n=0;$n < 4;$n++){
				$single_bullet=get_post_meta($post_id,"mog_bullet_".$n."_mog_bulletpoint",true);
				if(!empty($single_bullet)) {
					$mog_count=$mog_count+1;				
				}
			}
			if((int)$mog_count > 0 && get_post_meta($post_id,"mog_bullet_0_mog_bulletpoint",true)){
				echo '<ul>';
				for($i=0;$i<$mog_count;$i++){
					
					echo "<li>".get_post_meta($post_id,"mog_bullet_".$i."_mog_bulletpoint",true)."</li>";					
				}
				echo "</ul>";	
			}
		?>
		<?php the_content(); ?>
		<?php do_action( 'simple_fb_after_the_content' ); ?>
	</article>
</body>
</html>
