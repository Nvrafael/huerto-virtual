<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function test()
    {
        return response()->json([
            'status' => 'ok',
            'authenticated' => Auth::check(),
            'user' => Auth::user(),
            'routes' => [
                'login' => route('login'),
                'register' => route('register'),
                'dashboard' => route('dashboard'),
                'ranking' => route('ranking'),
            ]
        ]);
    }
}