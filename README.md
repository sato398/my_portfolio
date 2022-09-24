## 環境構築

```shell
$ cd portfolio

$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan storage:link

$ docker-compose build --no-cache
$ docker-compose up -d

$ php artisan migrate
$ php artisan admin:install
$ php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
$ php artisan db:seed
```

## テストコード実行

```shell
$ cp .env.example .env.testing
$ php artisan key:generate --env=testing
$ php artisan migrate --env=testing
$ php artisan test
```
