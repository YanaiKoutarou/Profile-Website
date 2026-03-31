<?php
/**
 * テーマのセットアップ
 * タイトルタグの有効化やメニューの登録を行います
 */
function my_theme_setup() {
    // <title>タグを自動生成
    add_theme_support('title-tag');
    // カスタムメニュー（グローバルナビゲーション）を登録
    register_nav_menus(array(
        'global-nav' => 'グローバルメニュー'
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

/**
 * CSSファイルを読み込む
 */
function my_theme_enqueue_styles() {
    // style.cssを読み込む
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

/**
 * 固定ページの自動生成プログラム
 * メニューに必要な「スキル」「プロダクト」「実績」「強み」を自動で作ります
 */
function auto_create_menu_pages() {
    $pages = array(
        'skill' => array('title' => 'スキル', 'template' => 'page-skill.php'),
        'product' => array('title' => 'プロダクト', 'template' => 'page-product.php'),
        'works' => array('title' => '実績', 'template' => 'page-works.php'),
        'strength' => array('title' => '強み', 'template' => 'page-strength.php'),
    );

    foreach ($pages as $slug => $data) {
        // 同じスラッグのページが既に存在するか確認
        $page_check = get_page_by_path($slug);
        if (!isset($page_check->ID)) {
            // 存在しない場合は新しく作成（下書きではなく公開状態で作成）
            $new_page_id = wp_insert_post(array(
                'post_title' => $data['title'],
                'post_type' => 'page',
                'post_name' => $slug,
                'post_status' => 'publish',
            ));
            // ページテンプレートを割り当てる
            if ($new_page_id && !is_wp_error($new_page_id)) {
                update_post_meta($new_page_id, '_wp_page_template', $data['template']);
            }
        }
    }
}
add_action('after_setup_theme', 'auto_create_menu_pages');

/**
 * インストール時に初期作成される「サンプルページ」をゴミ箱へ移動
 */
function auto_trash_sample_page() {
    $sample_page = get_page_by_path('sample-page');
    if ($sample_page && $sample_page->post_status === 'publish') {
        wp_trash_post($sample_page->ID);
    }
}
add_action('init', 'auto_trash_sample_page');
