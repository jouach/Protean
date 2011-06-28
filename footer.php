<footer id="page_footer">
		<div id="poweredby" class="fl_left">Powered by the Protean Theme from Landau Reece.</div>
		<!-- &copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?> -->
		<div id="feed_link" class="fl_right">
			<a href="<?php bloginfo('rss2_url'); ?>" class="box accent"><?php _e('Entries RSS')?></a>
			<a href="<?php bloginfo('comments_rss2_url'); ?>" class="box accent"><?php _e('Comments RSS')?></a>
		</div>
	</footer><!-- page_footer -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/protean_script.js"></script> 
	<?php wp_footer(); ?>
	<!-- end scripts-->
</body> 
</html>