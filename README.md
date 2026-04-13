# FLEA MARKET APP（フリマアプリ）

## アプリケーション概要

ユーザーが商品を出品・購入できるフリマアプリケーションです。
商品の一覧表示、詳細確認、出品、購入機能を実装しています。

---

## 作成した目的

COACHTECH確認テスト課題として、LaravelのMVC構造を理解し、
実践的なECサイトに近いアプリケーションを構築するため。

---

## アプリケーション機能

* 認証機能（ユーザー登録 / ログイン / ログアウト）
* 商品一覧表示
* 商品詳細表示
* 商品出品
* 商品編集
* 商品削除
* 商品購入機能
* マイページ機能
* 画像アップロード

---

## 使用技術（実行環境）

| 技術      | バージョン |
|----------|------------|
| PHP      | 8.4以上     |
| Laravel  | 13.x       |
| MySQL    | 8.0        |
| nginx    | 1.21       |
| Docker   | 最新        |

---

## ER図

```
(users) 1 --- N (products)
(users) 1 --- N (purchases)
(products) 1 --- 1 (purchases)

+----------------+
| users          |
+----------------+
| id             |
| name           |
| email          |
| password       |
| created_at     |
| updated_at     |
+----------------+

    │ 1
    │
    │ N
+----------------+
| products       |
+----------------+
| id             |
| user_id        |
| name           |
| price          |
| description    |
| image          |
| created_at     |
| updated_at     |
+----------------+

    │ 1
    │
    │ 1
+----------------+
| purchases      |
+----------------+
| id             |
| user_id        |
| product_id     |
| created_at     |
| updated_at     |
+----------------+
```

---

## テーブル構造

### users

| カラム        | 型         |
| ---------- | --------- |
| id         | bigint    |
| name       | varchar   |
| email      | varchar   |
| password   | varchar   |
| created_at | timestamp |
| updated_at | timestamp |

---

### products

| カラム         | 型         |
| ----------- | --------- |
| id          | bigint    |
| user_id     | bigint    |
| name        | varchar   |
| price       | integer   |
| description | text      |
| image       | varchar   |
| created_at  | timestamp |
| updated_at  | timestamp |

---

### purchases

| カラム        | 型         |
| ---------- | --------- |
| id         | bigint    |
| user_id    | bigint    |
| product_id | bigint    |
| created_at | timestamp |
| updated_at | timestamp |

---

## URL設計

| URL                 | 機能                     |
| ------------------- | ---------------------- |
| /                   | 商品一覧（GET）              |
| /register           | ユーザー登録                 |
| /login              | ログイン                   |
| /products/{id}      | 商品詳細（GET）              |
| /products/create    | 商品出品                   |
| /products/{id}/edit | 商品編集                   |
| /products           | 商品一覧（GET） / 商品登録（POST） |
| /purchase/{id}      | 商品購入（POST）             |
| /mypage             | マイページ                  |

---

## コントローラ設計

* ProductController：商品管理機能
* PurchaseController：購入処理
* Auth：認証機能

---

## 環境構築

### リポジトリをクローン

```
git clone https://github.com/yokotakenji0413-bot/flea-market-app.git
```

### ディレクトリ移動

```
cd flea-market-app
```

### Dockerコンテナ作成
```
docker-compose up -d --build
```
---

## Laravel環境構築

### PHPコンテナへ入る
```
docker-compose exec php bash
```
### Composerインストール
```
composer install
```
※コンテナ内でcomposerが使用できない場合
```
docker-compose exec php composer install
```
---

### .envファイル作成
```
cp .env.example .env
```
---

### DB設定（.env）

以下のように設定してください
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=user
DB_PASSWORD=password
```
※DB_HOSTは docker-compose.yml のサービス名（mysql）を指定

---

### アプリケーションキー作成
```
php artisan key:generate
```
---

### マイグレーション実行
```
php artisan migrate
```
---

### ストレージリンク作成
```
php artisan storage:link
```
---

## コンテナ確認
```
docker-compose ps
```
---

## アクセス

<http://localhost:8080>

---

## phpMyAdmin

<http://localhost:8081>

---

## フォルダ構成
```
flea-market-app
│
├ docker
├ docker-compose.yml
├ README.md
│
└ src
   │
   ├ app
   │   ├ Http
   │   │   └ Controllers
   │   │
   │   └ Models
   │
   ├ database
   │   └ migrations
   │
   ├ public
   │
   ├ resources
   │   └ views
   │
   └ routes
```

---

## 工夫した点

* フリマアプリとして実用的な機能を実装
* 画像アップロードによる商品管理
* ユーザーごとの出品・購入管理

---

## 今後の課題

* 決済機能の実装
* お気に入り機能の追加
* コメント機能の追加
* 検索・フィルタ機能の強化

---

## 補足

* 画像は public/images ディレクトリに保存
* 画像パスは /images/ で参照

---

## 作成者

横田 憲治
