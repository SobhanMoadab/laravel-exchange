<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * @OA\Post(
     * path="/api/register",
     * summary="register",
     * description="register by email, password",
     * operationId="authregister",
     * tags={"auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"email","password","country_id"},
     *       @OA\Property(property="email", type="string", format="email", example="test@test.com"),
     *       @OA\Property(property="password", type="string", format="password", example="15101510"),
     *       @OA\Property(property="password_confirmation", type="string", format="password", example="15101510"),
     *       @OA\Property(property="country_id", type="string", example="1"),
     *    ),
     * ),
     * *   @OA\Response(
     *     response=200,
     *     description="Success",
     *    @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *  ),
     *  @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     * 
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     * 
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     * 
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     * 
     *   ),
     *  )
     
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'country_id' => 'required'

        ], [
            'email.required' => 'email is required',
            'password.required' => 'password is required',
            'country_id.required' => 'country is required',

        ]);
        try {
            $validated['password'] = bcrypt($request->password);
            $user = User::create($validated);
            $token = $user->createToken('authToken')->accessToken;
            $user_resource = new UserResource($user);
            return response()->json(['user' => $user_resource, 'token' => $token], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()],500);
        }
    }
     /**
     * @OA\Post(
     * path="/api/login",
     * summary="login",
     * description="login by email, password",
     * operationId="authlogin",
     * tags={"auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="test@test.com"),
     *       @OA\Property(property="password", type="string", format="password", example="15101510"),
     *    ),
     * ),
     * *   @OA\Response(
     *     response=200,
     *     description="Success",
     *    @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *  ),
     *  @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *  @OA\MediaType(
     *           mediaType="application/json",
     *      )
     * 
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     * 
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     * 
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     * 
     *   ),
     *  )
     
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'email is required',
            'password.required' => 'password is required',
        ]);
        try {
            if (!auth()->attempt($validated)) {
                return response()->json(['msg' => 'Invalid Credentials'],403);
            }
            $token = auth()->user()->createToken('authToken')->accessToken;
            return response()->json(['msg' => 'Logged In', 'token' => $token],200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()],500);
        }
    }
}
