<?php

namespace App\Models;

use App\Enums\TransactionType;
use App\Enums\UserRank;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUlids, HasApiTokens;

    protected $guarded = ['id'];

    protected $hidden = [
        'passcode',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'passcode' => 'hashed',
            'rank' => UserRank::class,
        ];
    }

    public function getAuthPassword()
    {
        return $this->passcode;
    }

    public function getBalance(): float
    {
        $transactions = $this->transactions;

        return $transactions
            ->where('type', TransactionType::DEBIT)
            ->sum('amount') - $transactions
            ->where('type', TransactionType::CREDIT)
            ->sum('amount');
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
