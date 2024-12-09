# アプリケーション名

contact-form

## 環境構築

Docker のビルドからマイグレーション、シーディングまでを記述する

docker-compose up -d --build

docker-compose exec php bash

composer install

.env.example をコピーし、.env 作成し、内容を変更する

php artisan migrate
php artisan db:seed

## 使用技術(実行環境)

Laravel v8.83.27
HTML/CSS

## ER 図

< - - - 作成した ER 図の画像 - - - >

## URL

開発環境：http://localhost/

調べた感じ、Fortify でのログインの際には vendor/laravel/fortify/src から操作すること
新規作成の際には、データをと取るイメージでできた

https://qiita.com/mu_tomoya/items/f62690cc50df395bce32
