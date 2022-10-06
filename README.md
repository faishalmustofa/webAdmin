# Web Admin CMS

[![Latest Stable Version](https://poser.pugx.org/novay/laravel-word-template/v/stable)](https://packagist.org/packages/novay/laravel-word-template)
[![Total Downloads](https://poser.pugx.org/novay/laravel-word-template/downloads)](https://packagist.org/packages/novay/laravel-word-template)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

- [About](#about)
- [Requirements](#requirements)
- [Installation Instructions](#installation-instructions)
- [Panduan Penggunaan](#penggunaan)
- [Basic Usage](#usage)
- [License](#license)

### About

Laravel Package to perform word replacement on files using document templates (`.rtf`) that have been provided.

[ID] Package Laravel untuk melakukan penggantian kata pada file menggunakan template dokumen (`.rtf`) yang sudah disediakan.

![Example](https://raw.githubusercontent.com/novay/laravel-word-template/master/example.png)

### Requirements
* [Laravel 5.1, 5.2, 5.3, 5.4, or 5.5+](https://laravel.com/docs/installation)
* [XAMPP](https://www.apachefriends.org/download.html)
* [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)

### Installation Instructions
1. 
1. From your projects root folder in terminal run:

    ```bash
        composer install or composer update
    ```

2. Register the package

    * Laravel 5.5 and up
    Uses package auto discovery feature, no need to edit the `config/app.php` file.

    * Laravel 5.4 and below
    Register the package with laravel in `config/app.php` under `providers` and `aliases` with the following:

    ```php
        'providers' => [
        ...
            Novay\WordTemplate\WordTemplateServiceProvider::class,
        ];

        'aliases' => [
        ...
           'WordTemplate' => Novay\WordTemplate\Facade::class, 
        ];
    ```



### License
Laravel Word Template is licensed under the MIT license. Enjoy!
