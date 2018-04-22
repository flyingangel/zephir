#!/bin/bash

wget -O test/unit/phpunit https://phar.phpunit.de/phpunit-7.phar
chmod +x test/unit/phpunit
test/unit/phpunit --version

