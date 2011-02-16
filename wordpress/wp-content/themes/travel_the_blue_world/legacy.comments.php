<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	exit('Please do not load this page directly.');

if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'kubrick'); ?></p>
<?php else : ?>
<?php if ($comments) : ?>
<div class="Post">
    <div class="Post-tl"></div>
    <div class="Post-tr"><div></div></div>
    <div class="Post-bl"><div></div></div>
    <div class="Post-br"><div></div></div>
    <div class="Post-tc"><div></div></div>
    <div class="Post-bc"><div></div></div>
    <div class="Post-cl"><div></div></div>
    <div class="Post-cr"><div></div></div>
    <div class="Post-cc"></div>
    <div class="Post-body">
<div class="Post-inner article">

<div class="PostContent">

<h3 id="comments"><?php comments_number(__('No Responses', 'kubrick'), __('One Response', 'kubrick'), __('% Responses', 'kubrick'));?> <?php printf(__('to &#8220;%s&#8221;', 'kubrick'), the_title('', '', false)); ?></h3>

</div>
<div class="cleared"></div>


</div>

    </div>
</div>

<ul class="commentlist">
	<?php foreach ($comments as $comment) : ?>
		<li id="comment-<?php comment_ID() ?>">
<div class="Post">
          <div class="Post-tl"></div>
          <div class="Post-tr"><div></div></div>
          <div class="Post-bl"><div></div></div>
          <div class="Post-br"><div></div></div>
          <div class="Post-tc"><div></div></div>
          <div class="Post-bc"><div></div></div>
          <div class="Post-cl"><div></div></div>
          <div class="Post-cr"><div></div></div>
          <div class="Post-cc"></div>
          <div class="Post-body">
      <div class="Post-inner article">
      
<div class="PostContent">
      
      <?php echo get_avatar($comment, 32); ?>
			<cite><?php comment_author_link() ?></cite>:
      <?php if ($comment->comment_approved == '0') : ?>
			<em>
        <?php _e('Your comment is awaiting moderation.'); ?>
      </em>
			<?php endif; ?>
			<br />
			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date(__('F jS, Y', 'kubrick')) ?> <?php comment_time() ?></a> <?php edit_comment_link(__('Edit', 'kubrick'),'&nbsp;&nbsp;',''); ?></small>
      <?php comment_text() ?>

      </div>
      <div class="cleared"></div>
      

      </div>
      
          </div>
      </div>
      
		</li>
	<?php endforeach; ?>
	</ul>
<?php else : ?>
<?php if ('open' != $post->comment_status) : ?>
<div class="Post">
    <div class="Post-tl"></div>
    <div class="Post-tr"><div></div></div>
    <div class="Post-bl"><div></div></div>
    <div class="Post-br"><div></div></div>
    <div class="Post-tc"><div></div></div>
    <div class="Post-bc"><div></div></div>
    <div class="Post-cl"><div></div></div>
    <div class="Post-cr"><div></div></div>
    <div class="Post-cc"></div>
    <div class="Post-body">
<div class="Post-inner article">

<div class="PostContent">

<p class="nocomments"><?php _e('Comments are closed.', 'kubrick'); ?></p>

</div>
<div class="cleared"></div>


</div>

    </div>
</div>

<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
<div class="Post">
    <div class="Post-tl"></div>
    <div class="Post-tr"><div></div></div>
    <div class="Post-bl"><div></div></div>
    <div class="Post-br"><div></div></div>
    <div class="Post-tc"><div></div></div>
    <div class="Post-bc"><div></div></div>
    <div class="Post-cl"><div></div></div>
    <div class="Post-cr"><div></div></div>
    <div class="Post-cc"></div>
    <div class="Post-body">
<div class="Post-inner article">

<div class="PostContent">

<h3 id="respond"><?php _e('Leave a Reply', 'kubrick'); ?></h3>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'kubrick'), get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'kubrick'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="
    <?php if (function_exists('wp_logout_url')) echo wp_logout_url(get_permalink()); else echo get_option('siteurl') . "/wp-login.php?action=logout"; ?>" title="<?php _e('Log out of this account', 'kubrick'); ?>"><?php _e('Log out &raquo;', 'kubrick'); ?></a></p>
<?php else : ?>
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small><?php _e('Name', 'kubrick'); ?> <?php if ($req) _e("(required)", "kubrick"); ?></small></label></p>
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small><?php _e('Mail (will not be published)', 'kubrick'); ?> <?php if ($req) _e("(required)", "kubrick"); ?></small></label></p>
<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website', 'kubrick'); ?></small></label></p>
<?php endif; ?>
<p><textarea name="comment" id="comment" cols="20" rows="10" tabindex="4"></textarea></p>
<p>
  <button class="Button" type="submit" name="submit" tabindex="5">
    <span class="btn">
      <span class="t">
        <?php _e('Submit Comment', 'kubrick'); ?>
      </span>
      <span class="r">
        <span></span>
      </span>
      <span class="l"></span>
    </span>
  </button>
  <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>

</div>
<div class="cleared"></div>


</div>

    </div>
</div>

<?php endif; ?>
<?php endif; ?>