<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\LoginResource;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $data = $request->all();
        if (!$token = auth()->attempt($data)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $data = Auth::user();
        $data['token'] = $token;
        return LoginResource::make($data);
    }
}
