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

[EN] Website Admin with management system to create, update, and delete (CRUD) data.

[ID] Situs web admin dengan sistem manajemen untuk Membuat, Memperbarui, dan Menghapus (CRUD) data.

### Requirements Installation
* [XAMPP](https://www.apachefriends.org/download.html)
* [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)
* [PHP v7.3^](https://www.php.net/manual/en/install.macosx.packages.php)
* [Git](https://www.atlassian.com/git/tutorials/install-git)
* [Visual Studio Code](https://code.visualstudio.com/download)

### Installation Instructions
1. Open Visual Studio Code, open folder and navigate to xampp repository xampp/htdocs/
2. Open a new terminal an run:
    ```bash
        git clone https://github.com/faishalmustofa/webAdmin
    ```
3. After finish the clone, run:

    ```bash
        composer install or composer update
    ```

4. Copy file .env.example and create a new .env file.
5. Setting the connection with database that has been created.
6. Generate laravel key app, run:

    ```bash
        php artisan key:generate
    ```

6. Migrate the migration to create database table, run :
    
    ```bash
        php artisan migrate
    ```

### License
Laravel Word Template is licensed under the MIT license. Enjoy!
