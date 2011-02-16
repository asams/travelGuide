<?php get_header(); ?>
<div class="contentLayout">
<div class="content">


<?php is_tag(); ?>
<?php if (have_posts()) : ?>

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


<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="pagetitle"><?php printf(__('Archive for the &#8216;%s&#8217; Category', 'kubrick'), single_cat_title('', false)); ?></h2>
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2 class="pagetitle"><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'kubrick'), single_tag_title('', false) ); ?></h2>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="pagetitle"><?php printf(_c('Archive for %s|Daily archive page', 'kubrick'), get_the_time(__('F jS, Y', 'kubrick'))); ?></h2>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="pagetitle"><?php printf(_c('Archive for %s|Monthly archive page', 'kubrick'), get_the_time(__('F, Y', 'kubrick'))); ?></h2>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="pagetitle"><?php printf(_c('Archive for %s|Yearly archive page', 'kubrick'), get_the_time(__('Y', 'kubrick'))); ?></h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="pagetitle"><?php _e('Author Archive', 'kubrick'); ?></h2>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="pagetitle"><?php _e('Blog Archives', 'kubrick'); ?></h2>
<?php } ?>

<?php
$prev_link = get_previous_posts_link(__('Newer Entries &raquo;', 'kubrick'));
$next_link = get_next_posts_link(__('&laquo; Older Entries', 'kubrick'));
?>

<?php if ($prev_link || $next_link): ?>
<div class="navigation">
			<div class="alignleft"><?php echo $next_link; ?></div>
			<div class="alignright"><?php echo $prev_link; ?></div>
</div>
<?php endif; ?>


</div>
<div class="cleared"></div>


</div>

    </div>
</div>



<?php while (have_posts()) : the_post(); ?>
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
<h2 class="PostHeaderIcon-wrapper">
  <img src="<?php bloginfo('template_url'); ?>/images/PostHeaderIcon.png" width="32" height="32" alt="PostHeaderIcon" />
<span class="PostHeader"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
<?php the_title(); ?>
</a></span>
</h2>
<?php ob_start(); ?>
<?php $icons = array(); ?>
<?php if (!is_page()) : ?>
<?php ob_start(); ?>
<img src="<?php bloginfo('template_url'); ?>/images/PostDateIcon.png" width="17" height="18" alt="PostDateIcon" />
<?php the_time(__('F jS, Y', 'kubrick')) ?>
<?php $icons[] = ob_get_clean(); ?>
<?php endif; ?>
<?php if (!is_page()) : ?>
<?php ob_start(); ?>
<img src="<?php bloginfo('template_url'); ?>/images/PostAuthorIcon.png" width="14" height="14" alt="PostAuthorIcon" />
<?php _e('Author', 'kubrick'); ?>: <a href="#" title="<?php _e('Author', 'kubrick'); ?>"><?php the_author() ?></a>
<?php $icons[] = ob_get_clean(); ?>
<?php endif; ?>
<?php if (current_user_can( 'edit_post', $post->ID )) : ?><?php ob_start(); ?>
<img src="<?php bloginfo('template_url'); ?>/images/PostEditIcon.png" width="14" height="14" alt="PostEditIcon" />
<?php edit_post_link(__('Edit', 'kubrick'), ''); ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?>
<?php if (0 != count($icons)): ?>
<div class="PostHeaderIcons metadata-icons">
<?php echo implode(' | ', $icons); ?>

</div>
<?php endif; ?>
<?php $metadataContent = ob_get_clean(); ?>
<?php if (trim($metadataContent) != ''): ?>
<div class="PostMetadataHeader">
<?php echo $metadataContent; ?>

</div>
<?php endif; ?>
<div class="PostContent">
<?php if (is_search()) the_excerpt(); else the_content(__('Read the rest of this entry &raquo;', 'kubrick')); ?>

</div>
<div class="cleared"></div>
<?php ob_start(); ?>
<?php $icons = array(); ?>
<?php if (!is_page()) : ?>
<?php ob_start(); ?>
<img src="<?php bloginfo('template_url'); ?>/images/PostCategoryIcon.png" width="18" height="18" alt="PostCategoryIcon" />
<?php printf(__('Posted in %s', 'kubrick'), get_the_category_list(', ')); ?>
<?php $icons[] = ob_get_clean(); ?>
<?php endif; ?>
<?php if (!is_page() && get_the_tags()) : ?><?php ob_start(); ?>
<img src="<?php bloginfo('template_url'); ?>/images/PostTagIcon.png" width="18" height="18" alt="PostTagIcon" />
<?php the_tags(__('Tags:', 'kubrick') . ' ', ', ', ' '); ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?>
<?php if (!is_page() && !is_single()) : ?><?php ob_start(); ?>
<img src="<?php bloginfo('template_url'); ?>/images/PostCommentsIcon.png" width="18" height="18" alt="PostCommentsIcon" />
<?php comments_popup_link(__('No Comments &#187;', 'kubrick'), __('1 Comment &#187;', 'kubrick'), __('% Comments &#187;', 'kubrick'), '', __('Comments Closed', 'kubrick') ); ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?>
<?php if (0 != count($icons)): ?>
<div class="PostFooterIcons metadata-icons">
<?php echo implode(' | ', $icons); ?>

</div>
<?php endif; ?>
<?php $metadataContent = ob_get_clean(); ?>
<?php if (trim($metadataContent) != ''): ?>
<div class="PostMetadataFooter">
<?php echo $metadataContent; ?>

</div>
<?php endif; ?>

</div>

    </div>
</div>

<?php endwhile; ?>

<?php if ($prev_link || $next_link): ?>
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

<div class="navigation">
			<div class="alignleft"><?php echo $next_link; ?></div>
			<div class="alignright"><?php echo $prev_link; ?></div>
</div>

</div>
<div class="cleared"></div>


</div>

    </div>
</div>

<?php endif; ?>

<?php else : ?>
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

<?php
	if ( is_category() ) { // If this is a category archive
		printf("<h2 class='center'>".__("Sorry, but there aren't any posts in the %s category yet.", "kubrick").'</h2>', single_cat_title('',false));
	} else if ( is_date() ) { // If this is a date archive
		echo('<h2>'.__("Sorry, but there aren't any posts with this date.", "kubrick").'</h2>');
	} else if ( is_author() ) { // If this is a category archive
		$userdata = get_userdatabylogin(get_query_var('author_name'));
		printf("<h2 class='center'>".__("Sorry, but there aren't any posts by %s yet.", "kubrick")."</h2>", $userdata->display_name);
	} else {
		echo("<h2 class='center'>".__('No posts found.', 'kubrick').'</h2>');
	}
	if(function_exists('get_search_form')) get_search_form();
?>

</div>
<div class="cleared"></div>


</div>

    </div>
</div>

<?php endif; ?>


</div>
<div class="sidebar1">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?>
</div>
<div class="sidebar2">
<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
</div>

</div>
<div class="cleared"></div>

<?php get_footer(); ?>