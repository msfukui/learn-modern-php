[![CI](https://github.com/msfukui/learn-modern-php/actions/workflows/php.yml/badge.svg)](https://github.com/msfukui/learn-modern-php/actions/workflows/php.yml)

# learn-modern-php

「モダン」とは何か? (を学ぶ個人的メモ)

## やりたいこと

* [x] PHP を入れる

* [x] パッケージ管理ツールを入れる

* [x] 単体テストツールを入れる

* [x] フォーマッターを入れる

* [x] 簡単な CI をセットアップする

* [x] サンプルアプリを書く

* [x] 開発環境をコンテナ化する

* [ ] E2E テストツールを入れる

* [ ] プライベートクラスタ環境にデプロイする

## 幾つかの前提条件

* コードは Vim で書きます → 途中から IntelliJ IDEA + IDEA Vim でも書く様になりました

    * LSP などの Vim 周りの設定はこの説明上からは一旦省略します

* 手持ちの Intel Mac 上に環境を作ります → 途中から会社の M2 Mac でも書く様になりました

    * Windows で作るなら WSL2 + Ubuntu で同じ様なことをやると思います

## 環境構築

注: 以下の記述は一部私自身の環境に依存しています。

### ディレクトリ構成

当面は `pds/skeleton` に合わせようと思います。

https://github.com/php-pds/skeleton

### PHP

```
$ sudo port install php82 php82-mbstring php82-xdebug php82-openssl php82-iconv
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

composer.json に autoload の設定を入れます。

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

src/, tests/ 配下に実コードとテストコードを配置して、いい感じにテストを動かします。

```
$ ./vendor/bin/phpunit tests
PHPUnit 10.3.4 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.10

.                                                                   1 / 1 (100%)

Time: 00:00.004, Memory: 6.00 MB

OK (1 test, 1 assertion)
```

### PHP Coding Standards Fixer

```
$ bin/composer require --dev friendsofphp/php-cs-fixer
Info from https://repo.packagist.org: #StandWithUkraine
./composer.json has been updated
Running composer update friendsofphp/php-cs-fixer
Loading composer repositories with package information
Updating dependencies
Lock file operations: 24 installs, 0 updates, 0 removals
...
Writing lock file
Installing dependencies from lock file (including require-dev)
Package operations: 24 installs, 0 updates, 0 removals
...
2 package suggestions were added by new dependencies, use `composer suggest` to see details.
Generating autoload files
44 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
No security vulnerability advisories found.
Using version ^3.26 for friendsofphp/php-cs-fixer
$ vendor/bin/php-cs-fixer --version
PHP CS Fixer 3.26.1 Crank Cake by Fabien Potencier and Dariusz Ruminski.
PHP runtime: 8.2.10
```

設定を入れた状態で dry-run してみます。

修正する差分があると以下の様な感じで表示されます。

```
$ ./vendor/bin/php-cs-fixer fix --dry-run --diff
Loaded config default from "/Users/msfukui/studies/learn-modern-php/.php-cs-fixer.dist.php".
Using cache file ".php-cs-fixer.cache".
   1) tests/GreeterTest.php
      ---------- begin diff ----------
--- /Users/msfukui/studies/learn-modern-php/tests/GreeterTest.php
+++ /Users/msfukui/studies/learn-modern-php/tests/GreeterTest.php
@@ -1,4 +1,6 @@
-<?php declare(strict_types=1);
+<?php
+
+declare(strict_types=1);
 use PHPUnit\Framework\TestCase;
 
 final class GreeterTest extends TestCase
@@ -5,7 +7,7 @@
 {
     public function testGreetsWithName(): void
     {
-        $greeter = new Greeter;
+        $greeter = new Greeter();
 
         $greeting = $greeter->greet('Alice');
 

      ----------- end diff -----------

   2) src/Greeter.php
      ---------- begin diff ----------
--- /Users/msfukui/studies/learn-modern-php/src/Greeter.php
+++ /Users/msfukui/studies/learn-modern-php/src/Greeter.php
@@ -1,4 +1,6 @@
-<?php declare(strict_types=1);
+<?php
+
+declare(strict_types=1);
 final class Greeter
 {
     public function greet(string $name): string

      ----------- end diff -----------


Found 2 of 2 files that can be fixed in 0.011 seconds, 14.000 MB memory used
```

良さそうなら fix します。

```
$ ./vendor/bin/php-cs-fixer fix
Loaded config default from "/Users/msfukui/studies/learn-modern-php/.php-cs-fixer.dist.php".
Using cache file ".php-cs-fixer.cache".
   1) tests/GreeterTest.php
   2) src/Greeter.php

Fixed 2 of 2 files in 0.009 seconds, 14.000 MB memory used
$ ./vendor/bin/php-cs-fixer fix --dry-run
Loaded config default from "/Users/msfukui/studies/learn-modern-php/.php-cs-fixer.dist.php".
Using cache file ".php-cs-fixer.cache".
```

設定ファイルは `.php-cs-fixer.dist.php` が共通で使うもの, `.php-cs-fixer.php` が個人で使うものとのことです。

このため .gitignore には `.php-cs-fixer.php` とキャッシュの `.php-cs-fixer.cache` を追加します。

### PHP MESS Detector

https://phpmd.org/rules/index.html

```
# composer require --dev phpmd/phpmd
./composer.json has been updated
Running composer update phpmd/phpmd
Loading composer repositories with package information
Updating dependencies
Lock file operations: 5 installs, 0 updates, 0 removals
  - Locking pdepend/pdepend (2.16.2)
  - Locking phpmd/phpmd (2.15.0)
  - Locking symfony/config (v7.0.0)
  - Locking symfony/dependency-injection (v7.0.1)
  - Locking symfony/var-exporter (v7.0.1)
Writing lock file
Installing dependencies from lock file (including require-dev)
Package operations: 5 installs, 0 updates, 0 removals
  - Downloading symfony/var-exporter (v7.0.1)
  - Downloading symfony/dependency-injection (v7.0.1)
  - Downloading symfony/config (v7.0.0)
  - Downloading pdepend/pdepend (2.16.2)
  - Downloading phpmd/phpmd (2.15.0)
  - Installing symfony/var-exporter (v7.0.1): Extracting archive
  - Installing symfony/dependency-injection (v7.0.1): Extracting archive
  - Installing symfony/config (v7.0.0): Extracting archive
  - Installing pdepend/pdepend (2.16.2): Extracting archive
  - Installing phpmd/phpmd (2.15.0): Extracting archive
Generating autoload files
51 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
No security vulnerability advisories found.
Using version ^2.15 for phpmd/phpmd
$ ./vendor/bin/phpmd --version
PHPMD 2.15.0
```

### PHPStan

```
$ bin/composer require --dev phpstan/phpstan
Info from https://repo.packagist.org: #StandWithUkraine
./composer.json has been updated
Running composer update phpstan/phpstan
Loading composer repositories with package information
Updating dependencies
Lock file operations: 1 install, 0 updates, 0 removals
  - Locking phpstan/phpstan (1.10.35)
Writing lock file
Installing dependencies from lock file (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Downloading phpstan/phpstan (1.10.35)
  - Installing phpstan/phpstan (1.10.35): Extracting archive
Generating autoload files
46 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
No security vulnerability advisories found.
Using version ^1.10 for phpstan/phpstan
$ vendor/bin/phpstan --version
PHPStan - PHP Static Analysis Tool 1.10.35
$ vendor/bin/phpstan analyse src tests
 18/18 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%


                                                                                                                        
 [OK] No errors                                                                                                         
                                                                                                                        

💡 Tip of the Day:
PHPStan is performing only the most basic checks.
You can pass a higher rule level through the --level option
(the default and current level is 0) to analyse code more thoroughly.
```

## サンプルアプリ

### MyRouter

シンプルな Web アプリケーションのための router 。(未完成)

使い方の例は public/MyRouter/index.php に書いていきます。

書いたものをテストする場合は、以下を実行して、

```
$ bin/phpd public/MyRouter/.router.php
[Fri Sep 22 23:29:21 2023] PHP 8.2.10 Development Server (http://localhost:8123) started
```

http://localhost:8123/(任意のパス名) にアクセスします。

### FizzBuzz

「PHP で理解するオブジェクト指向の活用 ちょうぜつソフトウェア設計入門」(ISBN987-4-297-13234-7) の「第5章 オブジェクト指向原則
SOLID」にある、FizzBuzz のハードコード版と抽象モデル版のそれぞれの実装とテストコードを写経したものです。 (P.85-90)

## 参考リンク

* モダンな PHP の開発の学び方

  https://okzk.org/blog/how-to-learn-modern-php/

* PHP: The Right Way

  http://ja.phptherightway.com/

* PHP Manual

  https://www.php.net/manual/

* PHPUnit

  https://phpunit.de/

* PHP Coding Standards Fixer

  https://github.com/PHP-CS-Fixer/PHP-CS-Fixer

* Setup PHP Action - Actions - Github Marketplace

  https://github.com/marketplace/actions/setup-php-action

* PHP Standards Recommendations

  https://www.php-fig.org/psr/

  PHP のおすすめの規約やインタフェースの集まり

    * PSR-1 Coding Style Guide  
      PSR-12 Extended Coding Style Guide

      https://www.php-fig.org/psr/psr-1

      https://www.php-fig.org/psr/psr-12

      php-cs-fixer の設定でお世話になっている

    * PSR-4 Autoloading Standard

      https://www.php-fig.org/psr/psr-4

      composer の autoload の理解に

    * PSR-7 HTTP Message Interface  
      PSR-15 HTTP Handlers  
      PSR-17 HTTP Factories  
      PSR-18: HTTP Client

      https://www.php-fig.org/psr/psr-7

      https://www.php-fig.org/psr/psr-15

      https://www.php-fig.org/psr/psr-17

      https://www.php-fig.org/psr/psr-18

      モダン(?)な Web アプリケーションフレームワークの理解に

    * PSR-11 Container Interface

      https://www.php-fig.org/psr/psr-11

      DI コンテナの理解に

    * PSR の誤解

      https://qiita.com/tadsan/items/942a381e952e12a8fa5a

      古い記事だが PSR の意味について明確に記載されている

* 作って理解する DI コンテナ

  https://tadsan.fanbox.cc/posts/2061773

  constractor injection の簡易 DI コンテナの実装サンプルと背景説明

  コード全体は以下の様です

  https://github.com/bag2php/container

* Router 関連

  'PHP Router' と検索に入力すると先頭に '自作' とサジェストされるの良い

    * PHPで高速に動作するURLルーティングを自作してみた

      https://devpixiv.hatenablog.com/entry/2015/12/13/145741

    * PHP - ルーティングを自作してみた

      https://www.coccoto.com/2020/02/07.html

    * kamiya-kei/LaralikeRouter

      https://github.com/kamiya-kei/LaralikeRouter

    * PHPでURLルーティングを自作する

      https://speakerdeck.com/bmf_san/phpdeurlruteinguwozi-zuo-suru

    * PHP8でフレームワークを作ってみた

      https://zenn.dev/tasteck/articles/f8995584904959

    * PSR-7とPSR-15を使ったWebアプリケーション開発

      https://emonkak.hatenablog.com/entry/2016/12/09/114231

      https://github.com/emonkak/php-router

    * PSR-HTTPシリーズを理解するための情報源

      https://scrapbox.io/php/PSR-HTTP%E3%82%B7%E3%83%AA%E3%83%BC%E3%82%BA%E3%82%92%E7%90%86%E8%A7%A3%E3%81%99%E3%82%8B%E3%81%9F%E3%82%81%E3%81%AE%E6%83%85%E5%A0%B1%E6%BA%90

    * Rails のルーティング

      https://railsguides.jp/routing.html

      ルーティングの書き方の参考に

    * PSR-15 Request Handlerから理解するMiddlewareの仕組み

      https://speakerdeck.com/n1215/psr-15-request-handlerkarali-jie-surumiddlewarefalseshi-zu-mi

* deptrac

  https://qossmic.github.io/deptrac/

  PHP の静的解析ツール, アーキテクチャテストに使われる, 一部は PHPStan と重複

* PHPStan

  https://phpstan.org/

  PHP の静的解析ツール, バグ検出, PHPDoc による拡張された型検査などの機能を提供

* Clean Code PHP

  https://github.com/piotrplenik/clean-code-php

  PHP のモダンなコードの書き方の解説, 今はちょっと古いかも..

* PHP MESS Detector (phpmd)

  https://phpmd.org/

  PHP のコード品質分析ツール, メトリクスを測定して表示してくれる

* 現在時刻が関わるユニットテストから、テスト容易性設計を学ぶ

    https://t-wada.hatenablog.jp/entry/design-for-testability
