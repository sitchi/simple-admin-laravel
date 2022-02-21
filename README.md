# simple-admin-laravel
 Simple Admin for the Laravel PHP Framework

![github-small](https://simple-admin-laravel.sitchi.dev/img/sal1.png)
![github-small](https://simple-admin-laravel.sitchi.dev/img/sal2.png)

### Demo Site
https://simple-admin-laravel.sitchi.dev/

user: demo@sitchi.dev

pass: Demo2020

## Get Started

### Requirements

* PHP >= 7.4
* [Apache][1] Web Server with [mod_rewrite][2] enabled or [Nginx][3] Web Server
* [MariaDB][5] >= 10.3

### Installation

##### Install via git clone

```bash
git clone https://github.com/sitchi/simple-admin-laravel

composer install
```

After the installation

1. Copy .env.example file to .env file with your DB connection information
2. php artisan key:generate
3. php artisan migrate --seed
4. php artisan passport:client --client
5. Write permissions of the storage directory `sudo chmod -R 0777 storage/`

## License

The Simple Admin is under the MIT License, you can view the license [here](https://github.com/sitchi/simple-admin-laravel/blob/master/LICENSE).

[1]: http://httpd.apache.org/
[2]: http://httpd.apache.org/docs/current/mod/mod_rewrite.html
[3]: http://nginx.org/
[4]: https://github.com/phalcon/cphalcon/releases
[5]: https://mariadb.org/
