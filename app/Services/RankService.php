<?php

namespace App\Services;

use App\Enums\UserRank;
use App\Enums\UserRankValue;
use App\Models\User;

class RankService
{
    public function recalculateRank(User $user)
    {
        $balance = $user->getBalance();

        $rank = match (true) {
            $balance > UserRankValue::BRONZE->value
                && $balance <= UserRankValue::SILVER->value => UserRank::SILVER,

            $balance > UserRankValue::SILVER->value
                && $balance <= UserRankValue::GOLD->value => UserRank::GOLD,

            $balance > UserRankValue::GOLD->value
                && $balance <= UserRankValue::PLATINUM->value => UserRank::PLATINUM,

            $balance > UserRankValue::PLATINUM->value
                && $balance <= UserRankValue::DIAMOND->value => UserRank::DIAMOND,

            default => UserRank::BRONZE,
        };

        $user->update([
            'rank' => $rank,
        ]);
    }
}
