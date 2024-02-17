<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return response()->json(['message' => 'Already logged in.'], Response::HTTP_OK);
        }

        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            /** @var User $user */
            $user = Auth::user();

            $token = $user->createToken(config('app.name'))->plainTextToken;

            $response = [
                'token' => $token,
                'name' => $user->name,
            ];

            return response()->json($response, Response::HTTP_OK);
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }


    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $logged = Auth::attempt($validated);

    //     if ($logged) {
    //         return redirect()->intended('/');
    //     }

    //     return back()->with('error_login', 'Ocorreu um erro ao fazer o login, tente novamente em alguns segundos');
    // }

    public function logout()
    {
        dd(Auth::user());
        Auth::logout();

        return response()->json(['message' => 'Logout successful.'], Response::HTTP_OK);
    }
}
