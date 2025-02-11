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