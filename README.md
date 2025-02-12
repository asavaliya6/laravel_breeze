## Breeze Multi Auth

- Install laravel ```composer create-project laravel/laravel laravel_demo```

<h3>Install Laravel Breeze</h3>

- Create an auth scaffold command to generate login, register, and dashboard functionalities using breeze :

```
composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run build
```

- Create Migration and Update User Model ```php artisan make:migration add_type_to_users_table``` ```php artisan migrate```

- Create Role Middleware ```php artisan make:middleware Role```

- Update file => bootstrap/app.php

- Create route => routes/web.php

- Create Controller ```php artisan make:controller AdminController``` ```php artisan make:controller AgentController```

- Create Blade file => resources/views/admin/dashboard.blade.php resources/views/agent/dashboard.blade.php

- Update AuthenticatedSessionController File => app/Http/Controllers/Auth/AuthenticatedSessionController.php
 
- Create User Seeder ```php artisan make:seeder UserSeeder``` ```php artisan db:seed --class=UserSeeder```

- Run app ```php artisan serve``` ```http://localhost:8000/```

<h3>Login Credentials</h3>

- Normal User:

```
Email: user@gmail.com
Password: 123456
```

- Admin User:

```
Email: admin@gmail.com
Password: 123456
```

- Agent User:

```
Email: agent@gmail.com
Password: 123456
```

## REST API with Passport Authentication

- Install Passport:

```
composer require laravel/passport
php artisan migrate
php artisan passport:install
```

- Publish the Passport configuration: ```php artisan vendor:publish --tag=passport-config```

- Add Passport authentication in config/auth.php
- Add Passport to the User Model Edit => app/Models/User.php
- Register Passport in Edit => app/Providers/AuthServiceProvider.php
- Create a PassportController ```php artisan make:controller PassportAuthController```
- Define API Routes in routes/api.php
- Create the Product Model & Migration : ```php artisan make:model Product -m``` ```php artisan migrate```
- Create ProductController : ```php artisan make:controller ProductController```
- Modify => routes/api.php

- Test the API :

1. Register: POST http://127.0.0.1:8000/api/passport/register
2. Login: POST http://127.0.0.1:8000/api/passport/login
3. Get User: GET http://127.0.0.1:8000/api/passport/user   Authorization: Bearer {token}
4. Logout: POST http://127.0.0.1:8000/api/passport/logout   Authorization: Bearer {token}
5. Get all products: GET http://127.0.0.1:8000/api/passport/products   Authorization: Bearer {token}
6. Create a product: POST http://127.0.0.1:8000/api/passport/products   Authorization: Bearer {token} - Content-Type: application/json
7. Get a single product: GET http://127.0.0.1:8000/api/passport/products/{id}   Authorization: Bearer {token}
8. Update a product: PUT http://127.0.0.1:8000/api/passport/products/{id}   Authorization: Bearer {token} - Content-Type: application/json
9. Delete a product: DELETE http://127.0.0.1:8000/api/passport/products/{id}   Authorization: Bearer {token}

## JWT Authentication API

- Install JWT Package ```composer require php-open-source-saver/jwt-auth```

- Publish the JWT configuration: ```php artisan vendor:publish --provider="PHPOpenSourceSaver\JWTAuth\Providers\LaravelServiceProvider"```

- Generate a JWT secret key: ```php artisan jwt:secret```

- Configure config/auth.php for JWT => config/auth.php
- Create a JWTAuthController ```php artisan make:controller JWTAuthController```

- Define API Routes in routes/api.php
- Modify => app/Models/User.php
- Create the Product Model & Migration : ```php artisan make:model Product -m``` ```php artisan migrate```
- Create ProductController : ```php artisan make:controller ProductController```
- Modify => routes/api.php

- Test the API :

1. Register: POST http://127.0.0.1:8000/api/jwt/register
2. Login: POST http://127.0.0.1:8000/api/jwt/login
3. Get User: GET http://127.0.0.1:8000/api/jwt/user   Authorization: Bearer {token}
4. Logout: POST http://127.0.0.1:8000/api/jwt/logout   Authorization: Bearer {token}
5. Get all products: GET http://127.0.0.1:8000/api/jwt/products   Authorization: Bearer {token}
6. Create a product: POST http://127.0.0.1:8000/api/jwt/products   Authorization: Bearer {token} - Content-Type: application/json
7. Get a single product: GET http://127.0.0.1:8000/api/jwt/products/{id}   Authorization: Bearer {token}
8. Update a product: PUT http://127.0.0.1:8000/api/jwt/products/{id}   Authorization: Bearer {token} - Content-Type: application/json
9. Delete a product: DELETE http://127.0.0.1:8000/api/jwt/products/{id}   Authorization: Bearer {token}


## Send Email using queue with smtp

- First enable 2-step varification on gmail then configure .env file :

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=mygoogle@gmail.com
MAIL_PASSWORD=rrnnucvnqlbsl
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=mygoogle@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

- Create Mail Class ```php artisan make:mail DemoMail```
- Create Controller ```php artisan make:controller MailController```
- Create Routes => routes/web.php
- Create Blade View => resources/views/emails/demoMail.blade.php
- Run App ```php artisan serve``` ```http://localhost:8000/send-mail```

## Send Email Via Notification

- Create Migration ```php artisan make:migration add_birthdate_column``` ```php artisan migrate```

- Update Model => app/Models/User.php
- Create Notification ```php artisan make:notification BirthdayWish```
- Create Route => routes/web.php
- Create Controller ```php artisan make:controller UserController```
- Run app ```php artisan serve``` ```http://localhost:8000/user-notify```

## Get User Location using IP Address

- First install php-curl in latest version : ```sudo apt update``` ```php -v``` ```sudo apt install php8.4-curl``` ```php -m | grep curl``` ```sudo systemctl restart apache2```
- Install the stevebauman/location package for getting the current location of the logged-in user ```composer require stevebauman/location```
- Publish Configuration File ```php artisan vendor:publish --provider="Stevebauman\Location\LocationServiceProvider"```
- Create Route => routes/web.php
- Create Controller ```php artisan make:controller AddressController```
- Update .env :

```
LOCATION_TESTING=false
IP_API_TOKEN=null
```

- Create Blade File => resources/views/address.blade.php
- Run App ```php artisan serve``` ```http://localhost:8000/address```

## Cron Job Task Scheduling

- The custom command will execute with task scheduling using cron job. ```php artisan make:command DemoCron --command=demo:cron```

- Define commands in the console.php file with the time when to run command ```Schedule::command('demo:cron')->everyMinute();```

- Ready to run cron, so manually check using the command of cron ```php artisan schedule:run```

- After running the command, check the log file where already printed some text So open log file => storage/logs/laravel.php

- Install crontab on the server ```crontab -e```
- Add line in file : 

```
* * * * * cd /path-to-project & php artisan schedule:run >> /dev/null 2>&1
```

## Simple CRUD

- Create Migration ```php artisan make:migration create_posts_table --create=posts``` ```php artisan migrate```

- Create Form Request Validation Class ```php artisan make:request PosttStoreRequest``` ```php artisan make:request PostUpdateRequest```

- Create Controller and Model ```php artisan make:controller PosttController --resource --model=Post``` ```php artisan make:model Post```

- Update => routes/web.php && => app/Provides/AppServiceProvider.php
 
- Add Blade Files => layout.blade.php index.blade.php create.blade.php edit.blade.php show.blade.

- Run App ```php artisan serve``` ```http://localhost:8000/posts```

## Full Calender with ajax

- Create Migration,Model,Controller and Update route:

```
php artisan make:migration create_events_table
php artisan migrate
php artisan make:model Event
php artisan make:controller FullCalenderController
```

-  then create ```fullcalender.blade.php``` file and run the project ```http://localhost:8000/fullcalender```


## Yajra Datatable

- php 8.4 version is not work on Yajra Datatable.so run Yajra Datatable on php 8.3 version.
- Install Yajra Datatable via the Composer package manager ```composer require yajra/laravel-datatables```
- Create table,model,controller,view and add route
- create some dummy users using Tinker Factory:

```
php artisan tinker
User::factory()->count(20)->create()
```

- Run ```http://localhost:8000/users```


## Localization

- Use localization  ```php artisan lang:publish```
- Define Language Messages => lang/en/messages.php => lang/gu/messages.php => lang/hi/messages.php
- Create a middleware to set current locale language ```php artisan make:middleware SetLocale```
- Register the SetLocale middleware to the => bootstrap/app.php
- Create route,controller and update blade file then run project.