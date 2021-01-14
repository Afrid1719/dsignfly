<?php 
/**
 * Dsignfly CPT template
 * 
 * @package dsignfly
 */
?>
<header class="dsignfly-single-post-header">
    <h2 class="dsignfly-single-post-title"><?php the_title(); ?></h2>
    <div class="post-info">
        <span class="post-meta">
            <?php dsignfly_posted_by();?> on <?php the_time('j F Y');?>
        </span>
        <span class="comments-number"><?php echo get_comments_number(); ?> comment(s)</span>  
    </div>
</header>
<article class="dsignfly-single-post-content"><?php the_content(); ?></article>