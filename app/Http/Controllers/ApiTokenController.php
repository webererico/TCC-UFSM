<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenController extends Controller
{
    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');
        $this->validateLogin($request);
        $user = User::where('email', $username)->first();
        if ($user != null) {
            if (Hash::check($password, $user->password)) {
                $token = Str::random(60);
                // $user->$this->guard()->user();
                $user->api_token = $token;
                $user->save();    
                return response()->json([
                    'data' => $user->toArray(),
                ]);
                // return response(['token' => $token], 200);
            }
            return response(['message' => 'Senha incorreta'], 405);
        } else {
            return response(['message' => 'Usuário não encontrado'], 405);
        }
    }

    public function test()
    {
        return response(['test' =>'funcionou'], 200);
    }
}
