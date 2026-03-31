<?php
/**
 * メインのインデックスページ
 * ヘッダー、フッター、および各種コンテンツパーツを読み込みます
 */
get_header(); // header.php を読み込む 
?>

    <div class="container">
      <!-- プロフィールセクションのテンプレートを読み込む -->
      <?php get_template_part('template-parts/content', 'profile'); ?>

      <!-- イントロダクション（紹介状）セクションのテンプレートを読み込む -->
      <?php get_template_part('template-parts/content', 'intro'); ?>
    </div>

<?php 
get_footer(); // footer.php を読み込む
?>
