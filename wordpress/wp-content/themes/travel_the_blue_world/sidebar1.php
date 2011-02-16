<div class="sidebar1">      
<?php if (!art_sidebar(1)): ?>
<div class="Block">
    <div class="Block-tl"></div>
    <div class="Block-tr"><div></div></div>
    <div class="Block-bl"><div></div></div>
    <div class="Block-br"><div></div></div>
    <div class="Block-tc"><div></div></div>
    <div class="Block-bc"><div></div></div>
    <div class="Block-cl"><div></div></div>
    <div class="Block-cr"><div></div></div>
    <div class="Block-cc"></div>
    <div class="Block-body">
<div class="BlockHeader">
    <div class="header-tag-icon">
        <div class="BlockHeader-text">
<?php _e('Search', 'kubrick'); ?>
        </div>
    </div>
    <div class="l"></div>
    <div class="r"><div></div></div>
</div>
<div class="BlockContent">
    <div class="BlockContent-tl"></div>
    <div class="BlockContent-tr"><div></div></div>
    <div class="BlockContent-bl"><div></div></div>
    <div class="BlockContent-br"><div></div></div>
    <div class="BlockContent-tc"><div></div></div>
    <div class="BlockContent-bc"><div></div></div>
    <div class="BlockContent-cl"><div></div></div>
    <div class="BlockContent-cr"><div></div></div>
    <div class="BlockContent-cc"></div>
    <div class="BlockContent-body">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" style="width: 95%;" />
<button class="Button" type="submit" name="search">
        <span class="btn">
            <span class="t"><?php _e('Search', 'kubrick'); ?></span>
            <span class="r"><span></span></span>
            <span class="l"></span>
        </span>
</button>

</form>

    </div>
</div>

    </div>
</div>
<div class="Block">
    <div class="Block-tl"></div>
    <div class="Block-tr"><div></div></div>
    <div class="Block-bl"><div></div></div>
    <div class="Block-br"><div></div></div>
    <div class="Block-tc"><div></div></div>
    <div class="Block-bc"><div></div></div>
    <div class="Block-cl"><div></div></div>
    <div class="Block-cr"><div></div></div>
    <div class="Block-cc"></div>
    <div class="Block-body">
<div class="BlockHeader">
    <div class="header-tag-icon">
        <div class="BlockHeader-text">
<?php _e('Archives', 'kubrick'); ?>
        </div>
    </div>
    <div class="l"></div>
    <div class="r"><div></div></div>
</div>
<div class="BlockContent">
    <div class="BlockContent-tl"></div>
    <div class="BlockContent-tr"><div></div></div>
    <div class="BlockContent-bl"><div></div></div>
    <div class="BlockContent-br"><div></div></div>
    <div class="BlockContent-tc"><div></div></div>
    <div class="BlockContent-bc"><div></div></div>
    <div class="BlockContent-cl"><div></div></div>
    <div class="BlockContent-cr"><div></div></div>
    <div class="BlockContent-cc"></div>
    <div class="BlockContent-body">
     <?php if ( is_404() || is_category() || is_day() || is_month() ||
            is_year() || is_search() || is_paged() ) {
      ?>
      <?php /* If this is a 404 page */ if (is_404()) { ?>
      <?php /* If this is a category archive */ } elseif (is_category()) { ?>
      <p><?php printf(__('You are currently browsing the archives for the %s category.', 'kubrick'), single_cat_title('', false)); ?></p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the day %3$s.', 'kubrick'), get_bloginfo('url'), get_bloginfo('name'), get_the_time(__('l, F jS, Y', 'kubrick'))); ?></p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for %3$s.', 'kubrick'), get_bloginfo('url'), get_bloginfo('name'), get_the_time(__('F, Y', 'kubrick'))); ?></p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the year %3$s.', 'kubrick'), get_bloginfo('url'), get_bloginfo('name'), get_the_time('Y')); ?></p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p><?php printf(__('You have searched the <a href="%1$s/">%2$s</a> blog archives for <strong>&#8216;%3$s&#8217;</strong>. If you are unable to find anything in these search results, you can try one of these links.', 'kubrick'), get_bloginfo('url'), get_bloginfo('name'), wp_specialchars(get_search_query(), true)); ?></p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives.', 'kubrick'), get_bloginfo('url'), get_bloginfo('name')); ?></p>


      <?php } ?>

      <?php }?>
      
      <ul>
      <?php wp_get_archives('type=monthly&title_li='); ?>
      </ul>
    
    </div>
</div>

    </div>
</div>

<?php endif ?>
</div>
