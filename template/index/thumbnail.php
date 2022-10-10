<?php


$thumbnail=nicen_theme_getThumbnail(); //是否显示

if ($thumbnail) { ?>
    <div class="i-article-right">
        <a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>">
            <img src="<?php echo $thumbnail ?>" alt="<?php the_title(); ?>"/>
        </a>
    </div>
<?php } ?>