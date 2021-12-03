


## Sample CRUD Laravel

- Laravel 8 (with laravel-passport auth)
- Vue 3
- Tabler 

### Installation 
- Open terminal
- Clone the repo => `git clone https://github.com/diorz38/LaraVueTabler.git`
- Or click [use this template](https://github.com/diorz38/LaraVueTabler/generate) up there, to make your own
- or click code and choose download zip
- Change directory to backend root dir => `cd LaraVueTabler/backend`
- run `cp .env.example .env`
- run `touch database\database.sqlite`
- Composer install => `composer install`
- migrate => `php artisan migrate`
- db seed => `php artisan db:seed`  
- run `php artisan passport:install`
- run `php artisan serve --port 8000`
- open new terminal and go to frontend dir => `cd ../frontend`
- run `npm install`
- run `npm run dev`
  
### open `http://localhost:3000/` on your browser

#### default user
```
    email    : admin@mail.com
    password : password
```

### ss
<img src="https://raw.githubusercontent.com/diorz38/LaraVueTabler/main/ss/ss1.png" alt="employee list preview">
