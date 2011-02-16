<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">

<label for="s"><?php _e('Search for:', 'kubrick'); ?></label>

<div><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" style="width: 95%;" />

<button class="Button" type="submit" name="search">
 <span class="btn">
  <span class="t"><?php _e('Search', 'kubrick'); ?></span>
  <span class="r"><span></span></span>
  <span class="l"></span>
 </span>
</button>
</div>
</form>

