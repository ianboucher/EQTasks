<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $credentials = [
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ];

        return User::create($credentials);
    }

    /**
     * Return the specified resource.
     *
     * @return Response
     */
    public function show(Request $request)
    {
        return User::where('email', '=', $request->input('email'))->first();
    }
}
