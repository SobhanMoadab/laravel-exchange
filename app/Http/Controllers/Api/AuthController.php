<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Core\Services\AuthenticationServices;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

    public function register(AuthenticationServices $auth, Request $request)
    {
        $result = $auth->register($request);
        return response()->json(['msg' => 'success', 'result' => $result], 200);
    }
    public function login(AuthenticationServices $auth, Request $request)
    {
        $result = $auth->login($request);
        return response()->json(['msg' => 'success', 'result' => $result,'token'=>$result['token']], 200);
    }

    // public function register(Request $request)
    // {
    //
    // }
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
}
