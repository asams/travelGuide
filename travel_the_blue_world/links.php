<?php get_header(); ?>
<div class="contentLayout">
<div class="content">

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
<?php _e('Links:', 'kubrick'); ?>
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

<ul>
<?php get_links_list(); ?>
</ul>

    </div>
</div>


    </div>
</div>


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