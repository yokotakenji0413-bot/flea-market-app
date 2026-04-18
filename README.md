# FLEA MARKET APP（フリマアプリ）

## アプリケーション概要

ユーザーが商品を出品・購入できるフリマアプリケーションです。
商品の一覧表示、詳細確認、出品、購入機能を実装しています。

---

## 作成した目的

COACHTECHの模擬案件を通じて、Laravelを用いたCRUD処理およびデータベース設計の理解を深めるために作成しました。

---

## 機能一覧

* ユーザー登録・ログイン機能
* 商品一覧表示
* 商品詳細表示
* 商品出品機能
* 商品購入機能
* マイリスト表示機能

---

## 使用技術

* PHP（Laravel 10）
* MySQL 8.0
* HTML / CSS
* Docker / Docker Compose

---

## ER図

本アプリケーションのデータベース構造を以下に示します。

![ER図](./er_diagram_pro_visual-1.png)

---

## テーブル設計

### users

| カラム名  | 型      | 説明      |
| ----- | ------ | ------- |
| id    | PK     | ユーザーID  |
| name  | string | ユーザー名   |
| email | string | メールアドレス |

---

### products

| カラム名    | 型      | 説明   |
| ------- | ------ | ---- |
| id      | PK     | 商品ID |
| user_id | FK     | 出品者  |
| name    | string | 商品名  |

---

### addresses

| カラム名    | 型  | 説明   |
| ------- | -- | ---- |
| id      | PK | 住所ID |
| user_id | FK | ユーザー |

---

### purchases

| カラム名       | 型  | 説明   |
| ---------- | -- | ---- |
| id         | PK | 購入ID |
| user_id    | FK | 購入者  |
| product_id | FK | 商品   |
| address_id | FK | 配送先  |

---

### categories

| カラム名 | 型      | 説明     |
| ---- | ------ | ------ |
| id   | PK     | カテゴリID |
| name | string | カテゴリ名  |

---

### category_product

| カラム名        | 型  | 説明   |
| ----------- | -- | ---- |
| category_id | FK | カテゴリ |
| product_id  | FK | 商品   |

---

## 環境構築

```
git clone https://github.com/yokotakenji0413-bot/flea-market-app.git
cd flea-market-app
docker-compose up -d --build
```

---

## URL

* 開発環境: <http://localhost>
* phpMyAdmin: <http://localhost:8080>

---

## 今後の改善点

* バリデーション強化
* UI/UXの改善
* 決済機能の追加

---

## 作成者

横田 憲治
