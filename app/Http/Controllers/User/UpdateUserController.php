<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, User $user)
    {
        $validation = [
            'passcode' => ['string', 'min:6', 'max:6'],
        ];

        $request->validate($validation);

        $user->update($request->only(array_keys($validation)));

        return response()->noContent();
    }
}
