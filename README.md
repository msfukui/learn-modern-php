# learn-modern-php

「モダン」とは何か? (を学ぶ個人的メモ)

## 環境構築

注: 以下の記述は一部私自身の環境に依存しています。

### PHP

```
$ sudo port install php82 php82-mbstring php82-xdebug php82-openssl
...
$ sudo port select --set php php82
Selecting 'php82' for 'php' succeeded. 'php82' is now active.
```

### Composer

```
$ curl https://getcomposer.org/installer -o composer-setup.php
  % Total    % Received % Xferd  Average Speed   Time    Time     Time  Current
                                 Dload  Upload   Total   Spent    Left  Speed
100 58167  100 58167    0     0  39798      0  0:00:01  0:00:01 --:--:-- 40032
$ php composer-setup.php --install-dir=bin --filename=composer
All settings correct for using Composer
Downloading...

Composer (version 2.6.3) successfully installed to: /Users/msfukui/studies/learn-modern-php/bin/composer
Use it: php bin/composer
$ bin/composer --version
Composer version 2.6.3 2023-09-15 09:38:21
$ rm composer-setup.php
```

### PHPUnit

```
$ bin/composer require --dev phpunit/phpunit
Info from https://repo.packagist.org: #StandWithUkraine
./composer.json has been created
Running composer update phpunit/phpunit
Loading composer repositories with package information
Updating dependencies
Lock file operations: 26 installs, 0 updates, 0 removals
...
Writing lock file
Installing dependencies from lock file (including require-dev)
Package operations: 26 installs, 0 updates, 0 removals
...
4 package suggestions were added by new dependencies, use `composer suggest` to see details.
Generating autoload files
23 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
No security vulnerability advisories found.
Using version ^10.3 for phpunit/phpunit
$ ./vendor/bin/phpunit --version
PHPUnit 10.3.4 by Sebastian Bergmann and contributors.
```

以下、composer.json に autoload の設定を入れます。

```
$ vim composer.json
 {
+  "autoload": {
+    "classmap": [
+      "src/"
+    ]
+  },
   "require-dev": {
     "phpunit/phpunit": "^10.3"
   }
 }
$ bin/composer dump-autoload
Generating autoload files
Generated autoload files
```

src/, tests/ 配下に実コードとテストコードを配置して、いい感じにテストが動いたら一旦 OK です。

```
$ ./vendor/bin/phpunit tests
PHPUnit 10.3.4 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.10

.                                                                   1 / 1 (100%)

Time: 00:00.004, Memory: 6.00 MB

OK (1 test, 1 assertion)
```

### ディレクトリ構成

当面は `pds/skeleton` に合わせようと思います。

https://github.com/php-pds/skeleton

## 参考リンク

* モダンな PHP の開発の学び方

    https://okzk.org/blog/how-to-learn-modern-php/

* PHP: The Right Way

    http://ja.phptherightway.com/

* PHP Manual

    https://www.php.net/manual/ja/index.php
