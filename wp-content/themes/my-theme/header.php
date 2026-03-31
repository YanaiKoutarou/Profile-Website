<!doctype html>
<!-- 言語設定を動的に取得 -->
<html <?php language_attributes(); ?>>
  <head>
    <!-- 文字エンコーディングの設定 -->
    <meta charset="<?php bloginfo('charset'); ?>" />
    <!-- レスポンシブ対応のためのビューポート設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- WordPressの必須フック（プラグインやテーマのスクリプトを読み込む） -->
    <?php wp_head(); ?>
  </head>
  <!-- bodyタグにページ固有のクラスを付与 -->
  <body <?php body_class(); ?>>
    <header>
      <!-- ホームへのリンク付きタイトル -->
      <h1><a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">プロフィール</a></h1>
      
      <!-- グローバルナビゲーション -->
      <nav class="global-nav">
        <?php
        // WordPressの管理画面でメニューが設定されているか確認
        if (has_nav_menu('global-nav')) {
            wp_nav_menu(array(
                'theme_location' => 'global-nav',
                'container'      => false,
            ));
        } else {
            // メニューがまだ設定されていない場合（初期状態）は固定ページを直接リンク表示
            echo '<ul>';
            $page_slugs = array('skill', 'product', 'works', 'strength');
            foreach ($page_slugs as $slug) {
                $p = get_page_by_path($slug);
                if ($p) {
                    echo '<li><a href="'.esc_url(get_permalink($p->ID)).'">'.esc_html($p->post_title).'</a></li>';
                }
            }
            echo '</ul>';
        }
        ?>
      </nav>
    </header>
