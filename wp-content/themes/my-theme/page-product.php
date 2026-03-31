<?php
/**
 * Template Name: プロダクト用ページ
 * プロダクト紹介用の個別ページテンプレートです
 */
get_header(); // ヘッダーを読み込む
?>
<div class="container">
  <!-- プロダクトコンテンツのパーツを読み込む -->
  <?php get_template_part('template-parts/content', 'product'); ?>
</div>
<?php 
get_footer(); // フッターを読み込む
?>
