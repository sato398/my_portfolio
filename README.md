## 環境構築

```shell
$ cd vape_world

$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan storage:link

$ ./vendor/bin/sail build --no-cache
$ ./vendor/bin/sail up

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
