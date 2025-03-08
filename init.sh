#!/usr/bin/env bash

composer install

./vendor/bin/sail up -d

./vendor/bin/sail artisan migrate

./vendor/bin/sail npm install

./vendor/bin/sail down
