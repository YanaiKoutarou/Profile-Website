<?php
/**
 * Template Name: スキル用ページ
 * 所有しているスキルを一覧表示するためのページテンプレートです
 */
get_header(); // ヘッダーを読み込む
?>
<div class="container">
  <!-- スキルコンテンツのパーツを読み込む -->
  <?php get_template_part('template-parts/content', 'skill'); ?>
</div>
<?php 
get_footer(); // フッターを読み込む
?>
