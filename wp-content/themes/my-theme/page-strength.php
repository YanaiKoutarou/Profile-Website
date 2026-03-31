<?php
/**
 * Template Name: 強み用ページ
 * 自分の強みやアピールポイントを紹介するためのページテンプレートです
 */
get_header(); // ヘッダーを読み込む
?>
<div class="container">
  <!-- 強みコンテンツのパーツを読み込む -->
  <?php get_template_part('template-parts/content', 'strength'); ?>
</div>
<?php 
get_footer(); // フッターを読み込む
?>
