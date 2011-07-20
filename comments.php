<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="center"><?php _e('This post is password protected. Enter the password to view comments.','protean')?></p><br/><br/>
	<hr/>
<?php
	return;
}
?>
<footer id="comments">
<?php if ( have_comments() ) : ?>
	<?php // count comments and ping(trackbacks)
	$ping_count = $comment_count = 0;
	foreach ( $comments as $comment ) get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;?>
	
	<?php if ($comment_count>0) { ?>
	<div class="content_main"><h3 class="comment_head"><?php printf($comment_count > 1 ? __('%d Comments','protean') : __('One Comment','protean'), $comment_count) ?></h3></div>
	
	<ol id="commentlist">
		<?php wp_list_comments('type=comment&callback=protean_comment&stye=div'); ?>
	</ol>
	<?php } ?>
	
	<?php if ($ping_count>0) { ?>
	<div class="content_main"><h3  class="comment_head"><?php printf($ping_count > 1 ? __('%d Trackbacks','protean') : __('One Trackback','protean'), $ping_count) ?></h3></div>
	<ul id="pinglist">
		<?php wp_list_comments('type=pings&callback=protean_ping'); ?>
	</ul>
	<?php } ?>
	<nav class="commentnav">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts fl_right"><?php next_comments_link() ?></div>
	</nav>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js"></script>
	<?php
		$defaults = 
		array(
			'comment_notes_before'	=> '<p class="content_main content_narrow">' . __( 'Your email address is <em>never</em> published nor shared.','protean' ) . ( $req ? '*' : '' ) . '</p>',
			'comment_notes_after'	=> '',
			'fields'				=> 
				array(
				'author' => '<div class="clr">
								<div class="content_main">
									<input type="text" name="author" id="author" class="box accent nospace full ' 
									. (($req) ? "required" : "" ) . '" value="'. esc_attr($comment_author).
									'" size="22" tabindex="1" ' . (($req) ? "aria-required='true'" : "" ) . '/>
								</div>
								<div class="content_aside"><label for="author" class="box primary fl_right">'. __('Name','protean') . ( $req ? "*" : "" ) . '</label></div>
							</div>',
				'email'  => '<div>
								<div class="content_main"><input type="text" class="box accent nospace full '
								.  ( $req ? "required email" : '' ) . '" name="email" id="email" value="' 
								.  esc_attr($comment_author_email) . '" size="22" tabindex="2" '. ( $req ? "aria-required='true'" : "" ) .' /></div>
								<div class="content_aside"><label for="email" class="box primary fl_right">'. __('Email','protean') . ( $req ? "*" : "" ) .'</label></div>
							</div>',
				'url'    => '<div>
								<div class="content_main"><input type="text" class="box accent nospace full" name="url" id="url" value="'
								. esc_attr($comment_author_url) .'" size="22" tabindex="3" /></div>
								<div class="content_aside"><label for="url" class="box primary fl_right">'. __('Website','protean') .'</label></div>
							</div>'
			),
		'comment_field'			=> '<div>
					<div class="content_main"><textarea name="comment" class="box accent nospace full required" id="comment" cols="58" rows="10" tabindex="4"></textarea></div>
					<div class="content_aside"><label for="comment" class="box primary fl_right">'. __('Comment','protean') .' *</label></div>
				</div>'
		);
		?>
	<?php comment_form($defaults) ?>	
<?php else : // comments are closed ?>
	<p class="center"><i><?php _e('Comment closed for this post.','protean')?></i></p>
<?php endif; ?>
</footer><!-- comments -->
<hr/>
<?php function protean_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<?php $color = 'primary'; if($comment->user_id==get_the_author_meta('ID'))$color='accent';?>
		<aside class="content_aside">
			<a class="box <?php echo $color ?> comment_date" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
			<?php printf(__('%1$s'), get_comment_date()) ?>
			</a>
			<?php if(get_comment_author_url()){ ?>
				<a href="<?php echo get_comment_author_url() ?>" class="box <?php echo $color ?> comment_author"><?php echo comment_author(); ?></a>
			<?php }else{ ?>
				<span class="box <?php echo $color ?> comment_author"><?php echo comment_author(); ?></span>
			<?php } ?>
		</aside>
		<div class="content_main">
			<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php _e('Your comment is awaiting moderation.','protean') ?></em></p>
			<?php endif; ?>
			<?php comment_text() ?>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			<?php edit_comment_link(__('(Edit)','protean'),'  ','') ?>
		</div>
<?php }
function protean_ping($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<?php $color = 'primary'; if($comment->user_id==get_the_author_meta('ID'))$color='accent';?>
		<aside class="content_aside">
			<a class="box <?php echo $color ?> comment_date" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
			<?php printf(__('%1$s','protean'), get_comment_date()) ?>
			</a>
		</aside>
		<div class="content_main">
			<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php _e('Your comment is awaiting moderation.','protean') ?></em></p>
			<?php endif; ?>
			<?php if(get_comment_author_url()){ ?>
				<a href="<?php echo get_comment_author_url() ?>" class="ping_source"><?php echo comment_author(); ?></a>
			<?php }else{ ?>
				<span class="ping_source"><?php echo comment_author(); ?></span>
			<?php } ?>
			<div class="ping_blurb"><?php comment_text() ?></div>
			<?php edit_comment_link(__('(Edit)','protean'),'  ','') ?>
		</div>
<?php } ?>