<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VerifyUserPasscodeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, User $user)
    {
        $request->validate([
            'passcode' => ['required', 'string', 'min:6', 'max:6'],
        ]);

        $verified = Hash::check($request->input('passcode'), $user->passcode);

        return response()->json([
            'verified' => $verified,
        ]);
    }
}
