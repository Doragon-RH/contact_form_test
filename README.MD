# アプリケーション名
contact-form
## 環境構築
Dockerのビルドからマイグレーション、シーディングまでを記述する

docker-compose up -d --build

docker-compose exec php bash

php artisan migrate
php artisan db:seed

## 使用技術(実行環境)
Laravel v8.83.27
HTML/CSS


## ER図
< - - - 作成したER図の画像 - - - >

## URL
開発環境：http://localhost/


調べた感じ、Fortifyでのログインの際にはvendor/laravel/fortify/srcから操作すること
新規作成の際には、データをと取るイメージでできた

https://qiita.com/mu_tomoya/items/f62690cc50df395bce32