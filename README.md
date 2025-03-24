this repo is for reproducing issue https://github.com/orchidsoftware/platform/issues/2977

how to run app:

- sudo apt install php-sqlite3
- composer install
- php artisan serve
- go to http://127.0.0.1:8000/admin
- type login admin@admin.com, password 123
- look at "example" menu and filter users by private and show columns - they work incorrect.

- (database shipped with repo as sqlite)
- (.env is also shipped with git)
