<?php
/*
 * 输出文章的结构化数据
 * */
?>
<script type="application/ld+json">
    {
        "@context": {
            "@context": {
                "images": {
                  "@id": "http://schema.org/image",
                  "@type": "@id",
                  "@container": "@list"
                },
                "title": "http://schema.org/headline",
                "description": "http://schema.org/description",
                "pubDate": "http://schema.org/DateTime"
            }
        },
        "@id": "<?php the_permalink(); ?>",
        "title": "<?php the_title(); ?> ",
        "images": ["<?php echo nicen_theme_getThumb(); ?>"],
        "description": "<?php echo nicen_theme_getExcerpt(get_the_excerpt(), $post->post_password, true); ?> ",
        "pubDate": "<?php the_time('Y-m-d H:i:s') ?> ",
        "upDate": "<?php echo get_post_modified_time('Y-m-d H:i:s') ?> "
    }
</script>
