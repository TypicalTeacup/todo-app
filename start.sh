#!/usr/bin/env bash

./vendor/bin/sail up -d

# run asset bundler
./vendor/bin/sail npm run dev &

# run scheduler and queue worker
./vendor/bin/sail artisan schedule:work &
./vendor/bin/sail artisan queue:work &

./vendor/bin/sail logs -f

./vendor/bin/sail down
