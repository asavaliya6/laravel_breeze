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

1. Register: POST /api/passport/register
2. Login: POST /api/passport/login
3. Get User: GET /api/passport/user   Authorization: Bearer {token}
4. Logout: POST /api/passport/logout   Authorization: Bearer {token}
5. Get all products: GET /api/passport/products   Authorization: Bearer {token}
6. Create a product: POST /api/passport/products   Authorization: Bearer {token} - Content-Type: application/json
7. Get a single product: GET /api/passport/products/{id}   Authorization: Bearer {token}
8. Update a product: PUT /api/passport/products/{id}   Authorization: Bearer {token} - Content-Type: application/json
9. Delete a product: DELETE /api/passport/products/{id}   Authorization: Bearer {token}

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

1. Register: POST /api/jwt/register
2. Login: POST /api/jwt/login
3. Get User: GET /api/jwt/user   Authorization: Bearer {token}
4. Logout: POST /api/jwt/logout   Authorization: Bearer {token}
5. Get all products: GET /api/jwt/products   Authorization: Bearer {token}
6. Create a product: POST /api/jwt/products   Authorization: Bearer {token} - Content-Type: application/json
7. Get a single product: GET /api/jwt/products/{id}   Authorization: Bearer {token}
8. Update a product: PUT /api/jwt/products/{id}   Authorization: Bearer {token} - Content-Type: application/json
9. Delete a product: DELETE /api/jwt/products/{id}   Authorization: Bearer {token}