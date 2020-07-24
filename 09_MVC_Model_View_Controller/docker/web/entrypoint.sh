#!/bin/bash

COMPOSER="$PWD/composer.phar"
VENDOR="$PWD/vendor"

if [ ! -f "$COMPOSER" ]; then
    wget -c https://getcomposer.org/composer-stable.phar
    mv composer-stable.phar composer.phar
fi

if [ ! -d "$VENDOR" ]; then
    php composer.phar install
else
    php composer.phar update
fi

php -S 0.0.0.0:8080 -t public/
