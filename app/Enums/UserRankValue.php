<?php

namespace App\Enums;

enum UserRankValue: int
{
    case BRONZE = 100_000;
    case SILVER = 250_000;
    case GOLD = 500_000;
    case PLATINUM = 750_000;
    case DIAMOND = 1_000_000;
}
