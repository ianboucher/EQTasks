<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;

class AuthController extends Controller
{

    /**
     * Create and store a new user and return with user & token
     *
     * @return Response
     */
    public function signup(Request $request)
    {
        $credentials = [
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ];

        try
        {
            $user = User::create($credentials);
        }
        catch (JWTException $error)
        {
            return response()->json(['error' => 'User already exists'], HttpResponse::HTTP_CONFLICT);
        }
        $token = JWTAuth::fromUser($user);

        return response()->json(['token' => $token, 'user' => $user]);
    }


    /**
     * Return the generate token for valid user credentials
     *
     * @return Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials))
            {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        }
        catch (JWTException $e)
        {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }


    /**
     * Parse token and return the specified authenticated user.
     *
     * @return Response
     */
    public function getAuthenticatedUser()
    {
        try
        {
            if (!$user = JWTAuth::parseToken()->authenticate())
            {
                return response()->json(['user_not_found'], 404);
            }
        }
        catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e)
        {
            return response()->json(['token_expired'], $e->getStatusCode());
        }
        catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e)
        {
            return response()->json(['token_invalid'], $e->getStatusCode());
        }
        catch (Tymon\JWTAuth\Exceptions\JWTException $e)
        {
            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return response()->json(compact('user'));
    }
}
