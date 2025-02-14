## Install Composer

- https://getcomposer.org/download/


## Install Laravel

- https://laravel.com/docs/11.x#creating-a-laravel-project
- https://laraveldaily.com/lesson/laravel-beginners/install-composer-installer

```
composer create-project laravel/laravel example-app
```


## Run Project

- php artisan serve
- migrate table --> php artisan migrate
- make migration --> php artisan make:migration table_name
- rolling back migration --> php artisan migrate:rollback
- show database schema --> php artisan db:show --> php artisan db:table table_name
- create controller --> php artisan make:controller ControllerName
- create model --> php artisan make:model ModelName
- create view --> php artisan make:view ViewName

## Install API in Project

php artisan install:api ---> yes

## Requirements

- PHP = 8.3.16
- Composer = 2.8.4
- Laravel = 5.11.2


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

## REST API Authentication using Sanctum

- Install Sanctum:

```
php artisan install:api
```

- Create API routes for login, register, and pros REST API => routes/api.php
- Create Controller => app/Http/Controllers/API/BaseController.php =>app/Http/Controllers/API/RegisterController.php => app/Http/Controllers/API/ProController.php
- Create Eloquent API Resources ```php artisan make:resource ProResource```

- Test the API :

1. Register: POST http://127.0.0.1:8000/api/register
2. Login: POST http://127.0.0.1:8000/api/login
5. Get all products: GET http://127.0.0.1:8000/api/pros   Authorization: Bearer {token}
6. Create a product: POST http://127.0.0.1:8000/api/pros   Authorization: Bearer {token} - Content-Type: application/json
7. Get a single product: GET http://127.0.0.1:8000/api/pros/{id}   Authorization: Bearer {token}
8. Update a product: PUT http://127.0.0.1:8000/api/pros/{id}   Authorization: Bearer {token} - Content-Type: application/json
9. Delete a product: DELETE http://127.0.0.1:8000/api/pros/{id}   Authorization: Bearer {token}

- Create model and table ```php artisan make:migration create_pros_table``` ```php artisan migrate```

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

## CRUD with Toastr Notification 

- Create Migration ```php artisan make:migration create_posts_table --create=posts``` ```php artisan migrate```

- Create Form Request Validation Class ```php artisan make:request PosttStoreRequest``` ```php artisan make:request PostUpdateRequest```

- Create Controller and Model ```php artisan make:controller PosttController --resource --model=Post``` ```php artisan make:model Post```

- Update => routes/web.php && => app/Provides/AppServiceProvider.php
 
- Add Blade Files in posts folder=> layout.blade.php index.blade.php create.blade.php edit.blade.php show.blade.

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

- Run ```http://localhost:8000/datatables```


## Localization

- Use localization  ```php artisan lang:publish```
- Define Language Messages => lang/en/messages.php => lang/gu/messages.php => lang/hi/messages.php
- Create a middleware to set current locale language ```php artisan make:middleware SetLocale```
- Register the SetLocale middleware to the => bootstrap/app.php
- Create route,controller and update blade file then run project.

## Scout elastic search with Algolia driver and Confirm Box Before Delete Record from Database

- Install the Scout package ```composer require laravel/scout```

- publish configuration file ```php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"```

- Set the configuration database as the driver in .env file ```SCOUT_DRIVER=database```

- Install algolia composer package for driver ```composer require algolia/algoliasearch-client-php```

- Update Usermodel,create controller and add route
- Import Records: ```php artisan scout:import "App\Models\User"```
- Run the app ```http://localhost:8000/users```

## Generate Thumbnail Image

- It allows users to resize, crop, blur effect, pixelate, greyscale, sepia and apply filters to images easily. With simple syntax, it supports various formats like JPEG, PNG, and GIF.

- First need to:

```
sudo apt update
sudo apt install imagemagick php8.3-imagick -y
sudo systemctl restart apache2
php -m | grep imagick
```

- Install spatie/image for resizing images ```composer require spatie/image```
- Create Routes,Controller and blade file and run ```http://localhost:8000/image-upload```

## line Chart

- Highcharts JS is a popular JavaScript charting library 
- Create Controller,Route,Blade file and run.

## Change Date Format

- Create Controller,Blade file,Route and update user model
- Run ```http://127.0.0.1:8000/date-format``` ```http://127.0.0.1:8001/date-blade``` 

## Model Events

- Provides with retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, trashed, forceDeleting, forceDeleted, restoring, restored, and replicating model events to work with Eloquent models.

- Create model and migration ```php artisan make:model Note -m``` ```php artisan migrate```

- Create Controller ```php artisan make:controller NoteController``` and add route

- Run to Server:

1. Create a Post ```http://127.0.0.1:8000/create-note```

- Display Output (JSON Response):

```
{
    "id": 1,
    "title": "Laravel 11 Model Events",
    "slug": "laravel-11-model-events",
    "body": "Testing model events in Laravel 11.",
    "created_at": "2025-02-13T10:00:00.000000Z",
    "updated_at": "2025-02-13T10:00:00.000000Z"
}
```

2. Update a Post ```http://127.0.0.1:8000/update-note/1```

- Display Output (JSON Response):

```
{
    "id": 1,
    "title": "Updated Laravel 11 Title",
    "slug": "updated-laravel-11-title",
    "body": "Updated body content",
    "created_at": "2025-02-13T10:00:00.000000Z",
    "updated_at": "2025-02-13T10:05:00.000000Z"
}
```

3. Delete a Post ```http://127.0.0.1:8000/delete-note/1```

- Display Output (JSON Response):

```
{
    "message": "Post deleted successfully"
}
```

- Check Logs on Terminal:

```
tail -f storage/logs/laravel.log
```

- Display Output (JSON Response):

```
[2025-02-13 10:00:00] local.INFO: Creating event called: {"title":"Laravel 11 Model Events","body":"Testing model events in Laravel 11."}
[2025-02-13 10:00:00] local.INFO: Created event called: {"id":1,"title":"Laravel 11 Model Events","slug":"laravel-11-model-events","body":"Testing model events in Laravel 11."}
[2025-02-13 10:05:00] local.INFO: Updating event called: {"id":1,"title":"Updated Laravel 11 Title","slug":"updated-laravel-11-title","body":"Updated body content"}
[2025-02-13 10:05:00] local.INFO: Updated event called: {"id":1,"title":"Updated Laravel 11 Title","slug":"updated-laravel-11-title","body":"Updated body content"}
[2025-02-13 10:10:00] local.INFO: Deleting event called: {"id":1,"title":"Updated Laravel 11 Title","slug":"updated-laravel-11-title","body":"Updated body content"}
[2025-02-13 10:10:00] local.INFO: Deleted event called: {"id":1,"title":"Updated Laravel 11 Title","slug":"updated-laravel-11-title","body":"Updated body content"}
```

- Use php artisan migrate:refresh --seed to reset the database.
- If logs don’t appear, ensure LOG_CHANNEL=stack in .env.

## Telescope Installation and Configuration

- Laravel Telescope is a debug assistant for Laravel.Whenever write code it is very hard to debug the error in application manually. Telescope provides access to the requests coming into application, exceptions, log entries, database queries, model watch, catch, redis, queued jobs, mail, scheduled tasks and more in one place.

- Install Laravel Telescope Package ```composer require laravel/telescope```

- Also install for specific environment ```composer require laravel/telescope --dev```

- Install Telescope ```php artisan telescope:install``` ```php artisan migrate```

- Ready to run telescope ```localhost:8000/telescope/requests```

## Get,Set and Delete Cookie

- Create controller ```php artisan make:controller CookieController``` and add route.
- run set: ```http://127.0.0.1:8000/set-cookie``` get: ```http://127.0.0.1:8000/get-cookie``` Delete: ```http://127.0.0.1:8000/delete-cookie```

## Display Image from Storage Folder

- Configure Filesystem Disk on .env file: ```FILESYSTEM_DISK=public```

- Create a Symbolic Link: ```php artisan storage:link```  => This creates a symbolic link, allowing public access to files stored in storage/app/public.

- Create controller, blade file and add route.
- Run ```http://127.0.0.1:8000/upload``` 