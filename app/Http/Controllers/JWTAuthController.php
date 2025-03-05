<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class JWTAuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/jwt/register",
     *     summary="User Registration",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","email","password"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="johndoe@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password123")
     *         ),
     *     ),
     *     @OA\Response(response=200, description="User registered successfully"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(['user' => $user, 'token' => $token]);
    }

    /**
     * @OA\Post(
     *     path="/api/jwt/login",
     *     summary="User Login",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email", example="johndoe@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password123")
     *         ),
     *     ),
     *     @OA\Response(response=200, description="Successful login"),
     *     @OA\Response(response=401, description="Unauthorized"),
     * )
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }

        return response()->json(['token' => $token]);
    }

    /**
     * @OA\Get(
     *     path="/api/jwt/user",
     *     summary="Get Authenticated User",
     *     tags={"Auth"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(response=200, description="User data retrieved"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function getUser(Request $request)
    {
        return response()->json(JWTAuth::parseToken()->authenticate());
    }

    /**
     * @OA\Post(
     *     path="/api/jwt/logout",
     *     summary="User Logout",
     *     tags={"Auth"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(response=200, description="User logged out successfully"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Logged out successfully']);
    }
}
