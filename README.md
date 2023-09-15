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
