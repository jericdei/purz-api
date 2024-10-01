<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\LoginCodeSent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class GenerateCodeController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        ]);

        $code = mt_rand(10_000, 99_999);

        $name = "{$request->email}_code";

        Cache::put($name, $code, now()->addMinutes(5));

        Mail::to($request->email)->send(new LoginCodeSent($code));

        return response()->noContent();
    }
}
