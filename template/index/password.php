<?php
$url     = get_template_directory_uri();//主题url
$protect = $url . '/assets/images/empty.svg';
?>
<div class="password">
    <img src="<?= $protect; ?>" alt="404" style="">
    <?php echo get_the_password_form(); ?>
</div>
<?php get_template_part( './template/index/fixed' ); ?>