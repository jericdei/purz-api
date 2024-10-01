<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ValidateCodeController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
        ]);

        $name = "{$request->email}_code";

        if (strval(Cache::get($name)) !== strval($request->code)) {
            return response()->json([
                'message' => 'Code is invalid',
            ], 403);
        }

        Cache::forget($name);

        $user = User::query()->whereEmail($request->email)->first();

        if (!$user) {
            $user = User::create([
                'username' => $request->email,
                'email' => $request->email,
                'email_verified_at' => now(),
                'passcode' => bcrypt($request->code),
            ]);
        }

        Auth::login($user);

        return response()->noContent();
    }
}
