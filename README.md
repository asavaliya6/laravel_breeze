## Breeze Multi Auth

- Install laravel ```composer create-project laravel/laravel example-app```

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

- Install passport with api.php file ```php artisan install:api --passport```

<h3>Passport Configuration:</h3>

- added the HasApiTokens class of Passport => app/Models/User.php
- added API auth configuration => config/auth.php

- Add Product Table and Model :

```
php artisan make:migration create_products_table
php artisan migrate
php artisan make:model Product
```

- Create API Routes => routes/api.php
- Create Controller Files:

``` 
php artisan make:controller API/BaseController
php artisan make:controller API/RegisterController
php artisan make:controller API/ProductController
```

- Create Eloquent API Resources ```php artisan make:resource ProductResource```

- Run App ```php artisan serve```

```
'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer '.$accessToken,
]
```

1) Register API: Verb:POST, URL:http://localhost:8000/api/register
2) Login API: Verb:POST, URL:http://localhost:8000/api/login
3) Product List API: Verb:GET, URL:http://localhost:8000/api/products
4) Product Create API: Verb:POST, URL:http://localhost:8000/api/products
5) Product Show API: Verb:GET, URL:http://localhost:8000/api/products/{id}
6) Product Update API: Verb:PUT, URL:http://localhost:8000/api/products/{id}
7) Product Delete API: Verb:DELETE, URL:http://localhost:8000/api/products/{id}

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
- Create Controller ```php artisan make:controller UserController```
- Update .env :

```
LOCATION_TESTING=false
IP_API_TOKEN=null
```

- Create Blade File => resources/views/user.blade.php
- Run App ```php artisan serve``` ```http://localhost:8000/user```