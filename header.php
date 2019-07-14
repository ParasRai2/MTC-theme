
<?php
$page_id = get_the_ID();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" style="margin-top:0px !important;">
<head>
    <meta charset="utf-8">
    <title><?php apply_filters('the_content', get_post($page_id)->post_content); ?></title>
    <?php wp_head(); ?>
</head>
  