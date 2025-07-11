# Installation

Requires Linux terminal.

Clone repository. Create own .env file based on .env.example.

Then use commands step-by-step:
```
composer install
```
```
./vendor/bin/sail up -d
```
```
./vendor/bin/sail composer install
```
```
./vendor/bin/sail artisan migrate
```
```
./vendor/bin/sail composer run dev
```
Now you should be able to open project link (127.0.0.1).
