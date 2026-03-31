<?php
// WordPressの読み込み
require_once('/var/www/html/wp-load.php');
// テーマを自作テーマ（my-theme）に切り替える
switch_theme('my-theme');
echo 'テーマの有効化が正常に完了しました！';
