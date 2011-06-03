<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="center"><?php _e('This post is password protected. Enter the password to view comments.')?></p><br/><br/>
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
	<div class="content_main"><h3 class="comment_head"><?php printf($comment_count > 1 ? __('%d Comments') : __('One Comment'), $comment_count) ?></h3></div>
	<ol id="commentlist">
		<?php wp_list_comments('type=comment&callback=protean_comment&stye=div'); ?>
	</ol>
	<?php } ?>
	
	<?php if ($ping_count>0) { ?>
	<div class="content_main"><h3  class="comment_head"><?php printf($ping_count > 1 ? __('%d Trackbacks') : __('One Trackback'), $ping_count) ?></h3></div>
	<ul id="pinglist">
		<?php wp_list_comments('type=pings&callback=protean_ping'); ?>
	</ul>
	<?php } ?>
	<nav class="commentnav">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</nav>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<div id="respond">
		<div class="content_main content_narrow">
			<h3 class="comment_head"><?php comment_form_title( 'Post a comment', 'Leave a Reply to %s' ); ?></h3>
			<?php cancel_comment_reply_link('<p>Click here to cancel reply.</p>'); ?>
			<p><?php _e('Your email is')?> <em><?php _e('never')?></em> <?php _e('published nor shared. Required fields are marked')?> <span class="required">*</span></p>
		</div>
	
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p class="center"><?php _e('You must be')?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('logged in')?></a> <?php _e('to post a comment.')?></p>
		<?php else : ?>
		
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.validate.min.js"></script> 
		<ul>
			<?php if ( is_user_logged_in() ) : ?>
				<li>
					<div class="content_main">
						<p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php _e('Logged in as')?>  <?php echo $user_identity; ?></a>. 
						<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
					</div>
				</li>
			<?php else : ?>
	
				<li>
					<div class="content_main">
					<input type="text" name="author" id="author" class="box accent nospace full <?php if ($req) echo "required"; ?>" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></div>
					<div class="content_aside"><label for="author" class="box primary fl_right"><?php _e('Name')?> <?php if ($req) echo "*"; ?></label></div>
				</li>
	
				<li>
					<div class="content_main"><input type="text" class="box accent nospace full <?php if ($req) echo "required email"; ?>" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></div>
					<div class="content_aside"><label for="email" class="box primary fl_right"><?php _e('Email')?> <?php if ($req) echo "*"; ?></label></div>
				</li>
	
				<li>
					<div class="content_main"><input type="text" class="box accent nospace full" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></div>
					<div class="content_aside"><label for="url" class="box primary fl_right"><?php _e('Website')?></label></div>
				</li>
	
			<?php endif; ?>
	
			<li>
				<div class="content_main"><textarea name="comment" class="box accent nospace full required" id="comment" cols="58" rows="10" tabindex="4"></textarea></div>
				<div class="content_aside"><label for="comment" class="box primary fl_right"><?php _e('Comment')?> *</label></div>
			</li>
	
			<li>
				<div class="content_main"><input name="submit" type="submit" id="submit" class="box accent nospace" tabindex="5" value="Submit Comment" />
				<?php comment_id_fields(); ?></div>
			</li>
			
			<?php do_action('comment_form', $post->ID); ?>
		</ul>
		</form>
		<?php endif; // If registration required and not logged in ?>
	</div>
<?php else : // comments are closed ?>
	<p class="center"><i><?php _e('Comment closed for this post.')?></i></p>
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
				<p><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
			<?php endif; ?>
			<?php comment_text() ?>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			<?php edit_comment_link(__('(Edit)'),'  ','') ?>
		</div>
<?php }
function protean_ping($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<?php $color = 'primary'; if($comment->user_id==get_the_author_meta('ID'))$color='accent';?>
		<aside class="content_aside">
			<a class="box <?php echo $color ?> comment_date" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
			<?php printf(__('%1$s'), get_comment_date()) ?>
			</a>
		</aside>
		<div class="content_main">
			<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
			<?php endif; ?>
			<?php if(get_comment_author_url()){ ?>
				<a href="<?php echo get_comment_author_url() ?>" class="ping_source"><?php echo comment_author(); ?></a>
			<?php }else{ ?>
				<span class="ping_source"><?php echo comment_author(); ?></span>
			<?php } ?>
			<div class="ping_blurb"><?php comment_text() ?></div>
			<?php edit_comment_link(__('(Edit)'),'  ','') ?>
		</div>
<?php } ?>