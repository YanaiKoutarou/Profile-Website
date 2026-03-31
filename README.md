# Profile Website - My Professional Portfolio

カスタム WordPress テーマを使用した個人プロフィール・ポートフォリオサイトです。スキル、プロダクト、実績、強みを紹介するページを備えています。

## 📋 目次

- [機能](#機能)
- [セットアップ](#セットアップ)
- [使い方](#使い方)
- [プロジェクト構成](#プロジェクト構成)
- [開発環境](#開発環境)
- [ページテンプレート](#ページテンプレート)
- [ファイル更新方法](#📝-ファイル更新方法)
- [トラブルシューティング](#🐛-トラブルシューティング)

## ✨ 機能

- **カスタム WordPress テーマ** - レスポンシブデザインの自作テーマ
- **自動ページ生成** - スキル、プロダクト、実績、強みのページを自動作成
- **テンプレートパーツ** - 再利用可能なコンポーネント化されたテンプレート
- **Docker 対応** - 一発で開発環境を構築可能
- **カスタムメニュー** - グローバルナビゲーションメニューの登録

## 🚀 セットアップ

### 必須要件

- Docker
- Docker Compose

### インストール手順

```bash
# 1. プロジェクトをクローン
cd Profile-Website

# 2. Docker コンテナを起動
docker-compose up -d

# 3. WordPress にアクセス
# http://localhost:8000 をブラウザで開く
```

### 初回セットアップ

1. WordPress インストール画面が表示されたら、以下の情報を入力：
   - **データベース名**: wordpress
   - **ユーザー名**: wordpress
   - **パスワード**: wordpress
   - **ホスト**: db

2. WordPress ダッシュボードにログイン

3. **外観 > テーマ** から「My Profile Theme」を有効化

## 📖 使い方

### テーマのアクティベート

WordPress 管理画面から **外観 > テーマ** でテーマを有効化すると、自動的に以下のページが作成されます：

- **スキル** (`/skill`) - 技術スキル・能力を紹介
- **プロダクト** (`/product`) - 作成したプロダクトを紹介
- **実績** (`/works`) - 過去の実績・プロジェクトを紹介
- **強み** (`/strength`) - 個人の強みを紹介

### ページの編集

WordPress 管理画面から各ページを編集できます。テンプレートパーツは以下の場所にあります：

- `wp-content/themes/my-theme/template-parts/` ディレクトリ

## 📁 プロジェクト構成

```
Profile-Website/
├── docker-compose.yml              # Docker 設定ファイル
├── wordpress-stubs.php            # WordPress スタブファイル
├── README.md                        # このファイル
└── wp-content/
    └── themes/
        └── my-theme/
            ├── activate.php                    # テーマアクティベーション時の処理
            ├── functions.php                   # テーマの機能定義
            ├── style.css                       # メインスタイルシート
            ├── header.php                      # ヘッダーテンプレート
            ├── footer.php                      # フッターテンプレート
            ├── index.php                       # メインテンプレート
            ├── page-product.php               # プロダクトページ
            ├── page-skill.php                  # スキルページ
            ├── page-strength.php              # 強みページ
            ├── page-works.php                  # 実績ページ
            └── template-parts/                # 再利用可能なテンプレートパーツ
                ├── content-intro.php           # イントロダクション
                ├── content-product.php        # プロダクト内容
                ├── content-profile.php        # プロフィール内容
                ├── content-skill.php          # スキル内容
                ├── content-strength.php       # 強み内容
                └── content-works.php          # 実績内容
```

## 🛠️ 開発環境

### サービス構成

| サービス  | イメージ         | ポート | 説明             |
| --------- | ---------------- | ------ | ---------------- |
| WordPress | wordpress:latest | 8000   | WordPress サイト |
| MariaDB   | mariadb:10.6.4   | 3306   | データベース     |

### 環境変数

**データベース**:

- Root パスワード: `somewordpress`
- ユーザー: `wordpress`
- パスワード: `wordpress`
- データベース: `wordpress`

### 開発時のコマンド

```bash
# ログを確認
docker-compose logs -f wordpress

# コンテナを再起動
docker-compose restart

# コンテナを停止
docker-compose down

# ボリュームを含めて削除（完全リセット）
docker-compose down -v
```

## 🎨 ページテンプレート

### 利用可能なページテンプレート

- `page-skill.php` - スキルページ用テンプレート
- `page-product.php` - プロダクトページ用テンプレート
- `page-works.php` - 実績ページ用テンプレート
- `page-strength.php` - 強みページ用テンプレート

### テンプレートパーツの利用

各ページテンプレートから`get_template_part()`を使用してテンプレートパーツを読み込みます：

```php
get_template_part('template-parts/content', 'skill');
```

## 📝 ファイル更新方法

### CSS のカスタマイズ

`wp-content/themes/my-theme/style.css` を編集します。

### 機能の追加

`wp-content/themes/my-theme/functions.php` に関数を追加します。

### 新しいテンプレートパーツを作成

`wp-content/themes/my-theme/template-parts/` ディレクトリに新しいファイルを作成します。

### テーマ情報の更新

`wp-content/themes/my-theme/style.css` のヘッダーコメントを編集してテーマ情報を更新します。

## 🐛 トラブルシューティング

### "Error establishing a database connection" エラー

このエラーは、WordPress がマリアDB の完全な起動を待たずにアクセスしようとした時に発生します。

**解決方法:**

1. コンテナを停止・削除します：

```bash
docker-compose down
```

2. コンテナを再度起動します：

```bash
docker-compose up -d
```

3. **15～20 秒待ってから** `http://localhost:8000` にアクセスしてください。

**それでも解決しない場合:**

- マリアDB のログを確認：

```bash
docker-compose logs db
```

- WordPress のログを確認：

```bash
docker-compose logs wordpress
```

- 完全にリセット（データベースも削除）：

```bash
docker-compose down -v
docker-compose up -d
```

### WordPress にアクセスできない

- ポート `8000` が他のアプリケーションで使用されていないか確認
- `docker-compose ps` でコンテナが起動しているか確認
- ファイアウォール設定を確認

## 📄 ライセンス

GNU General Public License v2 or later

## 👨💼 作成者

Kotaro Yanai
