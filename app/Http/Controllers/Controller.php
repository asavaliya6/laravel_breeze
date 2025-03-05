<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="Laravel Breeze API",
 *     version="1.0.0",
 *     description="API documentation for Laravel Breeze with JWT authentication."
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */
abstract class Controller
{
    //
}
