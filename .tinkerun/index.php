<?php

use App\Models\User;

$users = User::all();

$withBalance = $users->map(fn(User $user) => ['id' => $user->id, 'balance' => $user->getBalance()]);

dd($withBalance);
