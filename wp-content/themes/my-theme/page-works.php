<?php
/**
 * Template Name: 実績用ページ
 * これまでの制作実績や職歴を表示するためのページテンプレートです
 */
get_header(); // ヘッダーを読み込む
?>
<div class="container">
  <!-- 実績コンテンツのパーツを読み込む -->
  <?php get_template_part('template-parts/content', 'works'); ?>
</div>
<?php 
get_footer(); // フッターを読み込む
?>
