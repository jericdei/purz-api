<?php

namespace App\Enums;

enum UserRank: string
{
    case BRONZE = 'bronze';
    case SILVER = 'silver';
    case GOLD = 'gold';
    case PLATINUM = 'platinum';
    case DIAMOND = 'diamond';

    public function maxBalance(): UserRankValue
    {
        return match ($this) {
            self::BRONZE => UserRankValue::BRONZE,
            self::SILVER => UserRankValue::SILVER,
            self::GOLD => UserRankValue::GOLD,
            self::PLATINUM => UserRankValue::PLATINUM,
            self::DIAMOND => UserRankValue::DIAMOND,
        };
    }
}
